<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionSamed extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'civilite',
        'nom',
        'prenom',
        'date_naissance',
        'telephone',
        'ville',
        'lieu_residence',
        'email',
        'situation_socio_profressionnelle',
        'est_assure',
        'offre_samed',
        'pack',
        'frais',
        'moyen_paiement',
        'si_adhesion',
        'numero_paiement',
        'token',
    ];

}
