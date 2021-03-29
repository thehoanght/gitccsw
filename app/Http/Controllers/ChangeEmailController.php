<?php

namespace App\Http\Controllers;

use App\Models\EmailAccount;
use App\Models\EtsyAccount;
use App\Models\ChangeEmailAccount;
use Carbon\Carbon;
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
    public function resetReview(Request $request)
    {
        try {
            ChangeEmailAccount::where("status", "review")->update(["status" => "pending"]);
            return "done";
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public function getResult(Request $request)
    {
        $datas = ChangeEmailAccount::get();
        foreach ($datas as $data) {
            $et = EtsyAccount::where('id', $data->email_old_id)->first();
            $em = EmailAccount::where('id', $data->email_new_id)->first();
            $created_at = str_replace(',',' ',Carbon::parse($et->created_at)->format('d M Y'));
            $purchased_at = str_replace(',',' ',$et->purchased_at );
            $date_created_account = str_replace(',',' ',$et->date_created_account);
            echo $em->email . ',' . $et->etsy_password_old . ',' . $em->password . ',' . $em->email_recover . ',' . $et->country . ',' . $et->address . ',' . $et->purchased . ',' . $purchased_at . ',' . $date_created_account . ',' . $et->credit_card . ',' . $created_at . ',' . $data->status;
            echo "<br>";
            //$email_new_id = $data->email_new_id;
        }
    }
}
