<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'nom_responsable_projet',
        'prenom_responsable_projet',
        'telephone_responsable_projet',
        'mail_responsable_projet',
        'titre_projet',
        'description_projet',
        'debut_projet',
        'fin_projet',
        'status_projet',
        'jours_vendus_projet',



    ];
}
