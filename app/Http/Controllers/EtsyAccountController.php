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

    public function index()
    {
        $total_pending = EtsyAccount::where('status', null)->count();
        $total_accounts = EtsyAccount::count();
        $total_processing = EtsyAccount::where('status', '0')->orWhere('status', '1')->count();
        $total_confirm = EtsyAccount::where('status', '0')->count();
        $total_unconfirm = EtsyAccount::where('status', '1')->count();
        $total_purchased = EtsyAccount::where('purchased', 'TRUE')->count();
        $total_purchased_done = EtsyAccount::where('status', '0')->where('purchased','TRUE')->count();
        $etsys = EtsyAccount::orderBy('id', 'DESC')->paginate(10);
        return view('dashboard.crawl.etsysList', [
            'etsys' => $etsys,
            'total_accounts' => $total_accounts,
            'total_pending' => $total_pending,
            'total_processing' => $total_processing,
            'total_confirm'=> $total_confirm,
            'total_unconfirm'=> $total_unconfirm,
            'total_purchased'=> $total_purchased,
            'total_purchased_done'=> $total_purchased_done
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
        $etsy = EtsyAccount::find($id);
        return view('dashboard.crawl.etsyShow', ['etsy' => $etsy]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etsy = EtsyAccount::find($id);
        return view('dashboard.crawl.edit', ['etsy' => $etsy]);
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
        //var_dump('bazinga');
        //die();
        $validatedData = $request->validate([
            'email_old'             => 'required',
            'etsy_password_old'           => 'required',
            'date_created_account'         => 'required'
        ]);
        $etsy = EtsyAccount::find($id);
        $etsy->email_old     = $request->input('email_old');
        $etsy->etsy_password_old   = $request->input('etsy_password_old');
        $etsy->credit_card = $request->input('credit_card');
        $etsy->date_created_account = $request->input('date_created_account');
        $etsy->credit_card_type = $request->input('credit_card_type');
        $etsy->address = $request->input('address');
        $etsy->purchased = $request->input('purchased');
        $etsy->purchased_at = $request->input('purchased_at');
        $etsy->country = $request->input('country');
        $etsy->shop = $request->input('shop');
        $etsy->facebook = $request->input('facebook');
        $etsy->google = $request->input('google');
        $etsy->twitter = $request->input('twitter');
        $etsy->shop_url = $request->input('shop_url');
        $etsy->status = $request->input('status');
        $etsy->note = $request->input('note');
        $etsy->save();
        $request->session()->flash('message', 'Successfully edited etsy');
        return redirect()->route('crawl.index');
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
