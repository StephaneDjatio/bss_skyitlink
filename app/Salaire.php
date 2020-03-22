<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salaire extends Model
{
    //
    protected $fillable = [
        'montant', 'prime', 'mois', 'annee', 'datePaiement', 'idEmp'
    ];
}
