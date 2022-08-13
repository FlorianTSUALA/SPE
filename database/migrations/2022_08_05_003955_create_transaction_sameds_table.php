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
            $table->string('civilite')->default(''); //['M','MME','MLLE']
            $table->string('nom')->default('');
            $table->string('prenom')->default('');
            $table->string('date_naissance')->default('');
            $table->string('telephone')->default('');
            $table->string('ville')->default(''); //['Libreville', 'Owendo', 'Akanda', 'Ntoum']
            $table->string('lieu_residence')->default('');
            $table->string('email')->default('');
            $table->string('situation_socio_profressionnelle')->default(''); // ['Salarie', 'Sans empoi', 'Etudiant']
            $table->string('est_assure')->default(''); //['Oui', 'Non']
            $table->string('offre_samed')->default('');
            $table->string('pack')->default('');
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
        Schema::dropIfExists('transaction_sameds');
    }
};
