<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GetAQuote extends Model
{
    protected $table = 'get_a_quote';

    protected $fillable = [
        'email', 'full_name', 'phone', 'message', 'zip_code'
    ];
}
