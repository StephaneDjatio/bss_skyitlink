<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    //
    protected $fillable = [
        'idSouscription', 'reference', 'objet', 'dateFacturation', 'idType'
    ];
}
