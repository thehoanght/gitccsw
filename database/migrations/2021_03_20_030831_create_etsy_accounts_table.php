<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtsyAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etsy_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('email_old');
            $table->string('etsy_password_old');
            $table->string('credit_card')->nullable();
            $table->string('credit_card_type')->nullable();
            $table->text('address')->nullable();
            $table->string('purchased')->nullable();            
            $table->string('purechased_at')->nullable();
            $table->string('shop')->nullable();
            $table->string('shop_url')->nullable();            
            $table->string('status')->nullable();            
            $table->text('note')->nullable();           
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
        Schema::dropIfExists('etsy_accounts');
    }
}