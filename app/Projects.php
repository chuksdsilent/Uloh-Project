<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'user_id', 
        'project_id', 
        'project_name',
        'sub_category',
        'project_address',
        'project_year',
        'project_cost',
        'link_to_website', 
        'pics_id', 
        'prof_service_id'
    ];
}
