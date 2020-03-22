<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = [
        'codeCli', 'nomCli', 'prenomCli', 'typeCli', 'adresseCli', 'telCli', 'telCli2', 'mailCli'
        , 'nomUtilisateur', 'motPasse'
    ];
}
