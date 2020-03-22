<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Souscription extends Model
{
    //
    protected $fillable = [
        'site', 'dateDeb', 'dateFin', 'statut','idClient','idService'
    ];
}
