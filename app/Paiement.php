<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    //
    protected $fillable = [
        'datePaie', 'montantPaie', 'idFacture', 'idTypeFact', 'transaction', 'idUser'
    ];
}
