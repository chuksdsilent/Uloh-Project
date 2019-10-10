<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_id', 100)->nullable()->default('text');
            $table->bigInteger('cat_id')->nullable()->default(12);
            $table->bigInteger('sub_cat_id')->nullable()->default(12);
            $table->string('product_name', 100)->nullable()->default('text');
            $table->bigInteger('price')->nullable()->default(12);
            $table->text('description')->nullable();
            $table->string('color', 100)->nullable()->default('text');
            $table->string('size', 100)->nullable()->default('text');
            $table->string('model', 100)->nullable()->default('text');
            $table->string('img_path', 100)->nullable()->default('text');
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
