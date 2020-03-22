<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    //
    protected $fillable = [
        'matriEmp', 'nomEmp', 'prenomEmp', 'adresseEmp', 'telephoneEmp', 'numCNI'
    ];
}
