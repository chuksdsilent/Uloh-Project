<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Blog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('blog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 200)->nullable()->default('text');
            $table->longText('content')->nullable();
            $table->string('img_path', 200)->nullable()->default('text');
            $table->integer('cat_id')->unsigned()->nullable()->default(12);
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
