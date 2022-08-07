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
        Schema::create('transaction_sameds', function (Blueprint $table) {
            $table->id();
            $table->string('civilite'); //['M','MME','MLLE']
            $table->string('nom');
            $table->string('prenom');
            $table->string('date_naissance');
            $table->string('telephone');
            $table->string('ville'); //['Libreville', 'Owendo', 'Akanda', 'Ntoum']
            $table->string('lieu_residence');
            $table->string('email');
            $table->string('situation_socio_profressionnelle'); // ['Salarie', 'Sans empoi', 'Etudiant']
            $table->string('est_assure'); //['Oui', 'Non']
            $table->string('offre_samed');
            $table->string('pack');
            $table->string('frais');
            $table->string('moyen_paiement'); //['Airtel Money', 'Moov Money']
            $table->string('si_adhesion');
            $table->string('numero_paiement');
            $table->string('token', 64)->unique();
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
        Schema::dropIfExists('transaction_sameds');
    }
};
