<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->nullable()->default(12);
            $table->integer('services_id')->unsigned()->nullable()->default(12);
            $table->integer('basic_infos_id')->unsigned()->nullable()->default(12);
            $table->string('website', 100)->nullable()->default('No Website');
            $table->string('bus_description', 100)->defaut('No Business Detail')->nullable()->default('text');
            $table->string('cert_and_award', 100)->nullable()->default('No Certificate Or Award');
            $table->string('cost_from', 100)->nullable()->default('No Precise Amount yet');
            $table->string('cost_to', 100)->nullable()->default('No Precise Amount yet');

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
        Schema::dropIfExists('business_details');
    }
}
