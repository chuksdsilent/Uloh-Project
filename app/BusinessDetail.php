<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessDetail extends Model
{
    protected $table = 'business_details';

    protected $fillable =  [
        'user_id',
        'services_id',
        'basic_infos_id',
        'website',
        'bus_description',
        'cert_and_award',
        'cost_range'
    ];
}
