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

            $table->string('message')->default('');
            $table->string('payment_token')->default('');
            $table->string('payment_method')->default('');
            $table->string('description')->default('');
            $table->string('status_request')->default('');

            $table->string('transaction_amount')->default('');
            $table->string('transaction_currency')->default('');
            $table->string('transaction_country')->default('');

            $table->string('type_service')->default(''); //['kredigo', 'samed']
            $table->string('etat')->default('En cours'); //['En Cours', 'Sucess', 'Echec']
            $table->string('transaction_service_id')->default('');


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
