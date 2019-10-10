<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesProvided extends Model
{
    protected $table = 'prof_services_provided';

    protected $fillable = [
        'user_id',
        'prof_services_id'
    ];
}
