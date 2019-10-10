<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdeaBook extends Model
{
    protected $table = 'ideabook';

    protected $fillable = [
        'user_id',
        'project_id',
        'pics_id'
    ];
}
