<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoSubCategories extends Model
{
    protected $table = 'photo_sub_categories';

    protected $fillable = [
        'photo_sub_cat_id',
        'cat_id',
        'name'
    ];
}
