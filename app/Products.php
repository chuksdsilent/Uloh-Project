<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'cat_id',
        'product_id',
        'sub_cat_id',
        'product_name',
        'price',
        'description',
        'color',
        'size',
        'model',
        'img_path',
        'thumbnail_path'
    ];
}
