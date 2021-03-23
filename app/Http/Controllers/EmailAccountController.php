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
        $etsy_email = $request->etsy_email;
        if (!empty($etsy_email)) {
            $email = EmailAccount::where('status', '1')->first();
            try {
                $email->note = $etsy_email;
                $email->status = 0;
                $email->save();
                return response()->json($email);
            } catch (\Throwable $th) {
                return 0;
            }
        } else {
            return 0;
        }
    }
    public function confirmChangedEmail(Request $request)
    {
        try {
            $email_old_id = EtsyAccount::where('email_old', $request->email_old)->first()->id;
            $email_new_id = EmailAccount::where('email', $request->email_new)->first()->id;
            ChangeEmailAccount::insert([
                'email_new_id'      =>  $email_new_id,
                'email_old_id'      =>  $email_old_id,
                'change_email_at'   =>  now(),
                'status'            =>  'pending'
            ]);

            EmailAccount::where('email', $request->email_new)
                ->update([
                    'status'    =>  0
                ]);
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public function confirmChangedEmailComplete(Request $request)
    {
        try {
            $email_old_id = EtsyAccount::where('email_old', $request->email_old)->first()->id;
            $email_new_id = EmailAccount::where('email', $request->email_new)->first()->id;
            ChangeEmailAccount::where('email_new_id', $email_new_id)->where('email_old_id', $email_old_id)->update(['status'    =>  'done']);
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public function putEmailAccount(Request $request)
    {
        #check exists
        if (EmailAccount::where('email', $request->email)->count()<1) {
            try {
                EmailAccount::insert([
                    'email' => $request->email,
                    'email_type' => $request->email_type,
                    'status' => 1,
                    'password' => $request->password,
                    'email_recover' => $request->email_recover
                ]);
                return 1;
            } catch (\Throwable $th) {
                return 0;
            }
        }else {
            return 0;
        }
    }
}
