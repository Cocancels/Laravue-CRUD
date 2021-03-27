<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'description_client',
        'raison_sociale_client',
        'statut_juridique_client',
        'capital_client',
        'siret_numero_client',
        'naf_code_client',
        'pays_siege_client',
        'adresse_siege_client',
        'code_postal_siege_client',
        'ville_siege_client',
    ];
}
