<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopByDepartmentContactInfo extends Model
{
    protected $table = 'shop_by_dept_contact_info';

    protected $fillable = [
        'email', 'transaction_id', 'full_name', 'address_1', 'address_2', 'phone', 'state'
    ];
}
