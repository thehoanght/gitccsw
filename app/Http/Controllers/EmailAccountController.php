<?php

namespace App\Http\Controllers;
use App\Models\EmailAccount;
use App\Models\EtsyAccount;
use App\Models\ChangeEmailAccount;
use Illuminate\Http\Request;

class EmailAccountController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function getNewEmail(Request $request)
    {
        EmailAccount::select('email','email_type','password','email_recover','email_recover_password')->update(['status'=>'geting']);
        return response()->json(EmailAccount::select('email','email_type','password','email_recover','email_recover_password')->where('status','1')->first());
    }
    public function confirmChangedEmail(Request $request)
    {
        $email_old_id = EtsyAccount::where('email_old',$request->email_old)->first()->id;
        $email_new_id = EmailAccount::where('email',$request->email_new)->first()->id;
        ChangeEmailAccount::insert([
            'email_new_id'      =>  $email_new_id,
            'email_old_id'      =>  $email_old_id,
            'change_email_at'   =>  now(),
            'status'            =>  'pending'
        ]);

        EmailAccount::where('email',$request->email_new)
                    ->update([
                        'status'    =>  0
                    ]);

    }
    public function confirmChangedEmailComplete(Request $request)
    {
        $email_old_id = EtsyAccount::where('email_old',$request->email_old)->first()->id;
        $email_new_id = EmailAccount::where('email',$request->email_new)->first()->id;
        ChangeEmailAccount::where('email_new_id',$email_new_id)->where('email_old_id',$email_old_id)->update(['status'    =>  'done']);
    }

    public function putEmailAccount(Request $request)
    {
        EmailAccount::insert([
            'email' => $request->email,
            'email_type' => $request->email_type,
            'status' => 1,
            'password' => $request->password,
            'email_recover' => $request->email_recover
        ]);
    }
}
