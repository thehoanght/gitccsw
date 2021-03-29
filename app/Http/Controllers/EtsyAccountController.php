<?php

namespace App\Http\Controllers;

use App\Models\EtsyAccount;
use Illuminate\Http\Request;

class EtsyAccountController extends Controller
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
            EtsyAccount::where("status", "review")->update(["status" => "pending"]);
            return "done";
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public function putAccount(Request $request)
    {
        #check exists
        if (EtsyAccount::where('email_old', $request->email)->count() < 1) {
            $account = $request->email;
            $password = $request->password;
            EtsyAccount::insert([
                'email_old' => $request->email,
                'etsy_password_old' => $request->password,
                'date_created_account' => $request->date_created_account,
                'credit_card' => $request->credit_card != '<CardType>' ? $request->credit_card : null,
                'credit_card_type' => $request->credit_card_type != '<CardType>' ? $request->credit_card_type : null,
                'address' => $request->address != '<Zipcode>' ? $request->address : null,
                'purchased' => $request->purchased != '<PURCHASED2>' ? $request->purchased : null,
                'purchased_at' => $request->purchased_at != '<DatePurchased>' ? $request->purchased_at : null,
                'country' => $request->country != '<CountryName>' ? $request->country : null,
                'shop'  => $request->shop_url != '<SHOPNAME>' ? $request->shop_url : null,
                'shop_url'  => $request->shop_url != '<SHOPNAME>' ? $request->shop_url : null,
                'facebook'  => $request->facebook  != '<FACEBOOK>' ? $request->facebook : FALSE,
                'google'  => $request->google != '<GOOGLE>' ? $request->google : FALSE,
                'twitter'  => $request->twitter != '<TWITTER>' ? $request->twitter : FALSE,
                'created_at' => now()
            ]);
            return 1;
        } else {
            return 0;
        }
    }
}
