<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GetAQuote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('get_a_quote', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 100)->nullable()->default('text');
            $table->string('full_name', 100)->nullable()->default('text');
            $table->string('phone', 100)->nullable()->default('text');
            $table->string('zip_code', 100)->nullable()->default('text');
            $table->longText('message')->nullable();
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
