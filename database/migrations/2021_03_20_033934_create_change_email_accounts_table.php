<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeEmailAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_email_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('email_new_id')->nullable();
            $table->unsignedBigInteger('email_old_id')->nullable();
            $table->timestamp('change_email_at');
            $table->string('status');
            $table->timestamps();

            $table->foreign('email_new_id')->references('id')->on('email_accounts');
            $table->foreign('email_old_id')->references('id')->on('etsy_accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('change_email_accounts');
    }
}
