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
        Schema::create('transaction_kredigos', function (Blueprint $table) {
            $table->id();
            // Information personelle
            $table->string('civilite');
            $table->string('nom');
            $table->string('prenom');
            $table->string('date_naissance');
            $table->string('telephone');
            $table->string('email');
            $table->string('ville');

            $table->string('secteur_emploie'); //["public", "prive",]
            $table->string('nom_employeur');
            $table->string('date_embauche');
            $table->string('type_contrat'); //["CDD", "CDI",]
            $table->string('salaire_net');
            $table->string('banque'); // [ 'BGFI', 'BICIG', 'COFINA', 'ECOBANK', 'EDG', 'FINAM', 'ORABANK', 'SODEC', 'UGB', 'SFE',]
            $table->string('piece_jointe_recto');
            $table->string('piece_jointe_verso');
            $table->string('piece_jointe_type'); //[CNI, PASSEPORT, 'PERMIS DE CONDUIRE', 'CARTE DE SEJOUR']


            $table->string('frais');
            $table->string('moyen_paiement'); //['Airtel Money', 'Moov Money']
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
        Schema::dropIfExists('transaction_kredigos');
    }
};
