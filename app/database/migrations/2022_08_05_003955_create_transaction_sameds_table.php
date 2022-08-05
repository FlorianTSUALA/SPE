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
            // Information personelle
            $table->string('civilite');
            $table->string('nom');
            $table->string('prenom');
            $table->string('date_naissance');
            $table->string('telephone');
            $table->string('email');
            $table->string('ville');

            $table->string('type_employeur');
            $table->string('nom_employeur');
            $table->string('date_embauche');
            $table->string('type_contrat');
            $table->string('salaire_net');
            $table->string('banque');

            $table->string('piece_jointe_recto');
            $table->string('piece_jointe_verso');
            $table->string('piece_jointe_type'); //[CNI, PASSEPORT, PERMIS_CONDUIRE, CARTE_SEJOUR]


            $table->string('montant');
            $table->string('moyen_paiement');
            $table->string('numero');

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
