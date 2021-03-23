<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_accounts', function (Blueprint $table) {
            $table->id();
            $table->string("email")->unique();
            $table->string("email_type");
            $table->string("status");
            $table->string("password");
            $table->string("email_recover")->nullable();
            $table->string("email_recover_password")->nullable();
            $table->text("note")->nullable();
            $table->string("email_created_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_accounts');
    }
}
