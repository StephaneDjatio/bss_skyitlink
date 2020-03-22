<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planification extends Model
{
    //
    protected $fillable = [
        'datePlan', 'statutPlan', 'idEmp', 'idInstallation'
    ];
}
