<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EtsyAccount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('etsy_accounts')->insert([
            'email_old' =>  'daohoang@gmail.com',
            'etsy_password_old' =>  '123123123',
            'credit_card' =>  'true',
            'credit_card_type' =>  'VISA',
            'address' =>  '20/10 Pham Nhu Xuong, Da Nang',
            'purchased' =>  'true',
            'facebook' =>  'true',
            'google' =>  'true',
            'twitter' =>  'true',
            'purechased_at' =>  '21/05/2015',
            'shop' =>  '23/03/2021',
            'shop_url' =>  'https://etsy.com/shop/sextoy',
            'status' =>  '1',
            'note' =>  'Chua su dung'
        ]);
    }
}
