<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactProfessional extends Model
{
    protected $table = "contact_professional";

    protected $fillable = [
        'receiver_user_id',
        'sender_user_id',
        'sender_fullname',
        'sender_phone',
        'message'
    ];
}
