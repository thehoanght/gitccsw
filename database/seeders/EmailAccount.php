<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailAccount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('email_accounts')->insert([
            'email' =>  'daohoang@gmail.com',
            'email_type' =>  'Gmail',
            'password' =>  '123123123',
            'status' =>  '1',
            'email_recover' =>  'hihihoang@yahoo.com',
            'email_recover_password' =>  '1231231232',
            'note' =>  'Chua dung',
            'email_created_at' =>  '23/03/2021',
        ]);

        //
        DB::table('email_accounts')->insert([
            'email' =>  'daviddao@gmail.com',
            'email_type' =>  'Gmail',
            'password' =>  '123123123',
            'status' =>  '1',
            'email_recover' =>  'hihihoa123ng@yahoo.com',
            'email_recover_password' =>  '1231231232',
            'note' =>  'Chua dung',
            'email_created_at' =>  '23/03/2021',
        ]);
        //
        DB::table('email_accounts')->insert([
            'email' =>  'kikkaa232@gmail.com',
            'email_type' =>  'Gmail',
            'password' =>  '123123123',
            'status' =>  '1',
            'email_recover' =>  'hihihoan123g@yahoo.com',
            'email_recover_password' =>  '1231231232',
            'note' =>  'Chua dung',
            'email_created_at' =>  '23/03/2021',
        ]);
        //
        DB::table('email_accounts')->insert([
            'email' =>  's34scalallrw@gmail.com',
            'email_type' =>  'Gmail',
            'password' =>  '123123123',
            'status' =>  '1',
            'email_recover' =>  'hihihoang@yahoo.com',
            'email_recover_password' =>  '1231231232',
            'note' =>  'Chua dung',
            'email_created_at' =>  '23/03/2021',
        ]);//
        DB::table('email_accounts')->insert([
            'email' =>  'daoh2oang@gmail.com',
            'email_type' =>  'Gmail',
            'password' =>  '123123123',
            'status' =>  '1',
            'email_recover' =>  'hihihoang@yahoo.com',
            'email_recover_password' =>  '1231231232',
            'note' =>  'Chua dung',
            'email_created_at' =>  '23/03/2021',
        ]);

        //
        DB::table('email_accounts')->insert([
            'email' =>  'davi4ddao@gmail.com',
            'email_type' =>  'Gmail',
            'password' =>  '123123123',
            'status' =>  '1',
            'email_recover' =>  'hihihoa123ng@yahoo.com',
            'email_recover_password' =>  '1231231232',
            'note' =>  'Chua dung',
            'email_created_at' =>  '23/03/2021',
        ]);
        //
        DB::table('email_accounts')->insert([
            'email' =>  'kik3kaa232@gmail.com',
            'email_type' =>  'Gmail',
            'password' =>  '123123123',
            'status' =>  '1',
            'email_recover' =>  'hihihoan123g@yahoo.com',
            'email_recover_password' =>  '1231231232',
            'note' =>  'Chua dung',
            'email_created_at' =>  '23/03/2021',
        ]);
        //
        DB::table('email_accounts')->insert([
            'email' =>  's34sc2alallrw@gmail.com',
            'email_type' =>  'Gmail',
            'password' =>  '123123123',
            'status' =>  '1',
            'email_recover' =>  'hihihoang@yahoo.com',
            'email_recover_password' =>  '1231231232',
            'note' =>  'Chua dung',
            'email_created_at' =>  '23/03/2021',
        ]);


    }
}
