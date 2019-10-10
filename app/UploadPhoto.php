<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadPhoto extends Model
{
    protected $table = 'photo_idea';

    protected $fillable = [
        'photo_id',
        'photo_sub_cat_id',
        'photo_name',
        'photo_path',
        'uploader',
        'company_name'
    ];
}
