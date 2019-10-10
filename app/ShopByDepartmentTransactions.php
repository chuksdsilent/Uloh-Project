<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopByDepartmentTransactions extends Model
{
    protected $table = 'shop_by_dept_transactions';

    protected $fillable = [
        'transaction_id','product_id', 'product_name', 'quantity', 'price', 'paystack_ref', 'delivered'
    ];
}
