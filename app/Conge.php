<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    //
    protected $fillable = [
        'libelleConge', 'dateDeb', 'dateFin', 'idEmp'
    ];
}
