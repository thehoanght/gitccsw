<?php

namespace App\Http\Controllers;

use App\Models\EmailAccount;
use App\Models\EmailGmailAccount;
use App\Models\EtsyAccount;
use App\Models\ChangeEmailAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PharIo\Manifest\Email;

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
    public function index()
    {
        $emails = EmailAccount::orderBy('id', 'DESC')->paginate(10);
        $total_email = EmailAccount::all()->count();
        $email_available =  EmailAccount::where('status', '1')->count();
        return view('dashboard.emailraw.report', [
            'emails' => $emails,
            'total_email' => $total_email,
            'email_available' => $email_available
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @retetsyurn \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getNewEmail(Request $request)
    {

        $country = $request->country;

        if ($country != "United Kingdom" && $country != "United States" && $country != "Canada" && $country != "Australia" && $country != "Singapore") {
            $arr = array('id' => 'null', 'email' => 'null', 'email_type' => 'null', 'status' => '0', 'password' => 'null', 'email_recover' => 'null', 'email_recover_password' => 'null', 'note' => 'null', 'email_created_at' => 'null', 'created_at' => 'null', 'updated_at' => 'null');
            return response()->json($arr);
        }



        $purchased = $request->purchased;
        $getEmailForType = "purchased"; #purchased and all
        #{"id":1,"email":"jojobaynton@yahoo.com","email_type":"dasdasd","status":0,"password":"asdasdasdsdasd","email_recover":"","email_recover_password":null,"note":"adsda1sd@gmail.com","email_created_at":null,"created_at":null,"updated_at":"2021-03-28T03:24:01.000000Z"}

        if ($getEmailForType == "purchased") {
            if ($purchased == "TRUE") {
                $etsy_email = $request->etsy_email;

                if (!empty($etsy_email)) {

                    if ($request->email_type == "gmail") {
                        #return gmail
                        $email = EmailGmailAccount::where('status', '1')->first();
                        try {
                            $email->note = $etsy_email;
                            $email->status = 0;
                            $email->save();
                            return response()->json($email);
                        } catch (\Throwable $th) {
                            return "het email";
                        }
                        return 0;
                    }

                    $email = EmailAccount::where('status', '1')->first();
                    try {
                        $email->note = $etsy_email;
                        $email->status = 0;
                        $email->save();
                        return response()->json($email);
                    } catch (\Throwable $th) {
                        return "het email";
                    }
                } else {
                    return 0;
                }
            } else {
                $arr = array('id' => 'null', 'email' => 'null', 'email_type' => 'null', 'status' => '0', 'password' => 'null', 'email_recover' => 'null', 'email_recover_password' => 'null', 'note' => 'null', 'email_created_at' => 'null', 'created_at' => 'null', 'updated_at' => 'null');
                return response()->json($arr);
            }
        } else {
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
    }

    public function getEmailAvailable(Request $request)
    {
        $dt = EmailAccount::where('status', '1')->get();
        foreach ($dt as $d) {
            echo $d->email . ',' . $d->password . ',' . $d->email_recover . '<br>';
        }
    }
    public function getNewEmailConfirm(Request $request)
    {

        $type = $request->type;
        if ($type == "purchased") {
            try {
                $data = ChangeEmailAccount::join('etsy_accounts', function ($join) {
                    $join->on('change_email_accounts.email_old_id', 'etsy_accounts.id');
                })
                ->where('etsy_accounts.purchased', 'TRUE')
                ->where('change_email_accounts.status', 'pending')
                // ->orderBy('change_email_accounts.id','DESC')
                ->first();

                //$data = ChangeEmailAccount::join('etsy_accounts', 'change_email_accounts.email_old_id', '=', 'etsy_accounts.id')->where('etsy_accounts.purchased', 'TRUE')->where('change_email_accounts.status', 'pending')->first();
                $email_new_id = $data->email_new_id;
                $email_old_id = $data->email_old_id;
                $email = EmailAccount::where('id', $email_new_id)->first();
                $etsy = EtsyAccount::where('id', $email_old_id)->first();

                $res = array('email' => $email->email, 'password' => $email->password, 'email_old' => $etsy->email_old, 'etsy_pass' => $etsy->etsy_password_old, 'email_id' => $email_new_id, 'etsy_id' => $email_old_id);
                return response()->json($res);
            } catch (\Throwable $th) {
                return 0;
            }
        } else {
            try {
                $data = ChangeEmailAccount::where('status', 'pending')->first();
                $email_new_id = $data->email_new_id;
                $email_old_id = $data->email_old_id;
                $email = EmailAccount::where('id', $email_new_id)->first();
                $etsy = EtsyAccount::where('id', $email_old_id)->first();

                $res = array('email' => $email->email, 'password' => $email->password, 'email_old' => $etsy->email_old, 'etsy_pass' => $etsy->etsy_password_old, 'email_id' => $email_new_id, 'etsy_id' => $email_old_id);
                return response()->json($res);
            } catch (\Throwable $th) {
                return 0;
            }
        }
    }

    public function confirmChangedPassword(Request $request)
    {
        try {
            EtsyAccount::where('email_old', $request->email_old)->update(['etsy_password_old' => $request->pass_email_new]);
            return 1;
        } catch (\Throwable $th) {
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
                'status'            =>  'pending',
                'created_at'            =>  now()
            ]);

            EmailAccount::where('email', $request->email_new)
                ->update([
                    'status'    =>  0
                ]);

            EtsyAccount::where('email_old', $request->email_old)->update(['status' => '0']);

            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public function confirmChangedEmailComplete(Request $request)
    {
        try {
            $status = $request->status;
            $email_old_id = EtsyAccount::where('email_old', $request->email_old)->first()->id;
            $email_new_id = EmailAccount::where('email', $request->email_new)->first()->id;
            $currrentStatus = ChangeEmailAccount::where('email_new_id', $email_new_id)->where('email_old_id', $email_old_id)->first()->status;
            if ($currrentStatus != "done") {
                ChangeEmailAccount::where('email_new_id', $email_new_id)->where('email_old_id', $email_old_id)->update(['status'    =>  $status]);
                return 1;
            } else {
                return "Da update tu truoc";
            }
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public function importEmailAccount(Request $request)
    {
        //Kiểm tra file
        if ($request->hasFile('emailfile')) {
            $file = $request->emailfile;
            //  \r\n
            $array = preg_split('/[\n\r]+/', $file->get());
            $count = 0;
            foreach ($array as $accinfo) {
                try {
                    $acc = explode(',', $accinfo);
                    $email_ = $acc[0];
                    $pass_ = $acc[1];
                    $recover_ = $acc[2];

                    #check exists
                    if (EmailAccount::where('email', $email_)->count() < 1) {
                        try {
                            EmailAccount::insert([
                                'email' => $email_,
                                'email_type' => 'Hotmail',
                                'status' => 1,
                                'password' => $pass_,
                                'email_recover' => $recover_,
                                'created_at' => now()
                            ]);
                            $count++;
                        } catch (\Throwable $th) {
                        }
                    }
                } catch (\Throwable $th) {
                }
            }
            return back()
                ->with('success', 'Đã upload ' . $count . ' email mới.');
        } else {
            return back()
                ->with('error', 'You have error when upload.');
        }
    }
    public function putEmailAccount(Request $request)
    {
        #check exists
        if (EmailAccount::where('email', $request->email)->count() < 1) {
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
        } else {
            return 0;
        }
    }
}
