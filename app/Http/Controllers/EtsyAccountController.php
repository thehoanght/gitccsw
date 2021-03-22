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
    public function putAccount(Request $request)
    {
        $account = $request->email;
        $password = $request->password;
        EtsyAccount::insert([
            'email_old' => $request->email,
            'etsy_password_old' => $request->password,
            'credit_card' => $request->credit_card,
            'credit_card_type' => $request->credit_card_type,
            'address' => $request->address,
            'purchased' => $request->purchased,
            'purechased_at' => $request->purechased_at
        ]);
    }
}
