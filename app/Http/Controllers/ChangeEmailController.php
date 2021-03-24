<?php

namespace App\Http\Controllers;

use App\Models\EmailAccount;
use App\Models\EtsyAccount;
use App\Models\ChangeEmailAccount;
use Illuminate\Http\Request;

class ChangeEmailController extends Controller
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
    public function getResult(Request $request)
    {
        $datas = ChangeEmailAccount::get();
        foreach ($datas as $data) {
            $et = EtsyAccount::where('id',$data->email_old_id)->first();
            $em = EmailAccount::where('id',$data->email_new_id)->first();
            echo $em->email.','.$et->etsy_password_old.','.$em->password.','.$em->email_recover.','.'country'.','.$et->address.','.$et->purchased.','.$et->purchased_at.','.'date_created'.','.$data->status;
            echo "<br>";
            //$email_new_id = $data->email_new_id;
        }
    }
}
