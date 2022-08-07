<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->string('message');
            $table->string('payment_token');
            $table->string('payment_method');
            $table->string('description');
            $table->string('status_request');

            $table->string('transaction_amount');
            $table->string('transaction_currency');
            $table->string('transaction_country');

            $table->string('type_service'); //['kredigo', 'samed']
            $table->string('transaction_service_id');
            

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
        Schema::dropIfExists('transactions');
    }
};
