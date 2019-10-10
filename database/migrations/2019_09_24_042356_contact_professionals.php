<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactProfessionals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_professional', function (Blueprint $table) {
            $table->increments('id');
            $table->string('receiver_user_id', 100)->nullable()->default('text');
            $table->string('sender_user_id', 100)->nullable()->default('text');
            $table->string('sender_fullname', 100)->nullable()->default('text');
            $table->string('sender_phone', 100)->nullable()->default('text');   
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
