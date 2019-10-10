<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicInfo extends Model
{
    protected $table = "basic_info";

    protected $fillable = [
        'user_id',
        'company_name',
         'first_name', 
         'last_name', 
         'address_1',
          'address_2', 
          'phone', 'city', 
          'state', 
          'country',
          'website',
          'bus_description',
          'cert_and_award',
          'cost_from',
          'cost_to',
          'profile_pics_link',
          'cover_pics_link'
    ];
}
