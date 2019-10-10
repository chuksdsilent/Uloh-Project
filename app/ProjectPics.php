<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectPics extends Model
{
    protected $table = 'project_pics';

    protected $fillable = [
        'pics_id', 'pics_link', 'user_id', 'prof_service_id'
    ];
}
