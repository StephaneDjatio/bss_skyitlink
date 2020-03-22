<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Installation extends Model
{
    //
    protected $fillable = [
        'upload', 'download', 'signal', 'dateInstall', 'statut', 'idEquipe', 'idSouscription'
    ];
}
