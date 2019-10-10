<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesSubCategory extends Model
{
    protected $table = "services_sub_categories";

    protected $fillable = [
        'prof_service_id',
        'cat_id',
        'slug',
        'name'
    ];
}
