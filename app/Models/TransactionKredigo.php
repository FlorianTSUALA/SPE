<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionKredigo extends Model
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
        'email',
        'ville',
        'secteur_emploie',
        'nom_employeur',
        'date_embauche',
        'type_contrat',
        'salaire_net',
        'banque',
        'piece_jointe_recto',
        'piece_jointe_verso',
        'piece_jointe_type',
        'frais',
        'moyen_paiement',
        'numero_paiement',
        'token',
    ];
    
}
