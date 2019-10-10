<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopByDeptTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_by_dept_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction_id', 100)->nullable()->default('text');
            $table->string('paystack_ref', 100)->nullable()->default('text');
            $table->string('product_id', 100)->nullable()->default('text');
            $table->string('product_name', 100)->nullable()->default('text');
            $table->bigInteger('quantity')->nullable()->default(12);
            $table->bigInteger('price')->nullable()->default(12);
            $table->string('delivered', 2)->nullable()->default('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
