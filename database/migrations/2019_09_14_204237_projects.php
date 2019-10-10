<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Projects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id', 100)->nullable()->default('text');
            $table->string('project_name', 255)->nullable()->default('text');
            $table->string('sub_category', 255)->nullable()->default('text');
            $table->string('project_address', 255)->nullable()->default('text');
            $table->string('project_year', 255)->nullable()->default('text');
            $table->string('project_cost', 100)->nullable()->default('text');
            $table->string('link_to_website', 255)->nullable()->default('text');
            $table->string('pics_id', 100)->nullable()->default('text');
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
