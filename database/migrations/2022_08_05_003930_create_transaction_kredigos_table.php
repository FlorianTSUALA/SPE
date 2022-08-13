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
            $table->string('civilite')->default('');
            $table->string('nom')->default('');
            $table->string('prenom')->default('');
            $table->string('date_naissance')->default('');
            $table->string('telephone')->default('');
            $table->string('email')->default('');
            $table->string('ville')->default('');

            $table->string('secteur_emploie')->default(''); //["public", "prive",]
            $table->string('nom_employeur')->default('');
            $table->string('date_embauche')->default('');
            $table->string('type_contrat')->default(''); //["CDD", "CDI",]
            $table->string('salaire_net')->default('');
            $table->string('banque')->default(''); // [ 'BGFI', 'BICIG', 'COFINA', 'ECOBANK', 'EDG', 'FINAM', 'ORABANK', 'SODEC', 'UGB', 'SFE',]
            $table->string('piece_jointe_recto')->default('');
            $table->string('piece_jointe_verso')->default('');
            $table->string('piece_jointe_type')->default(''); //[CNI, PASSEPORT, 'PERMIS DE CONDUIRE', 'CARTE DE SEJOUR']


            $table->string('frais')->default('');
            $table->string('moyen_paiement')->default(''); //['Airtel Money', 'Moov Money']
            $table->string('numero_paiement')->default('');

            $table->string('token', 64)->unique()->default('');
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
