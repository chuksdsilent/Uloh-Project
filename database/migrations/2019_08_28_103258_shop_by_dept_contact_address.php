<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopByDeptContactAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_by_dept_contact_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 100)->nullable()->default('text');
            $table->string('transaction_id', 100)->nullable()->default('text'); 
            $table->string('full_name', 100)->nullable()->default('text');
            $table->longText('address_1')->nullable();
            $table->longText('address_2')->nullable();
            $table->string('phone')->nullable()->default('text');
            $table->string('state', 100)->nullable()->default('text');

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
