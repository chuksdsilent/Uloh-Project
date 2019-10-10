<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServicesSubCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sub_id', 100)->nullable()->default('text');
            $table->bigInteger('cat_id')->nullable()->default(12);
            $table->string('name', 200)->nullable()->default('text');
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
        Schema::drop('services_sub_categories');
    }
}
