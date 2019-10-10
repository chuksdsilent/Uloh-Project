<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id', 50)->nullable()->default('No ID');
            $table->string('prof_service_id', 100)->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name');
            $table->integer('company_type');
            $table->longText('address_1')->nullable();
            $table->longText('address_2')->nullable();
            $table->string('city', 50)->nullable()->default('No City');
            $table->string('state', 50)->nullable()->default('No State');
            $table->string('country', 50)->nullable()->default('No Country');
            $table->string('phone', 15)->nullable()->default('No Phone');
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
        Schema::dropIfExists('baic_infos');
    }
}
