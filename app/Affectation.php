<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    //
    protected $fillable = [
        'dateAffectation', 'salaireDeBase', 'idEmp', 'idPoste','idUser','statut'
    ];
}
