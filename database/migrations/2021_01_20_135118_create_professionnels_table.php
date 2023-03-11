<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionnels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->unsignedBigInteger('commercial_id')->unsigned()->nullable();
            $table->string('entreprise')->nullable();
            $table->string('type')->nullable();
            $table->string('adresse')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('wilaya')->nullable();
            $table->string('RC')->nullable();
            $table->string('NIF')->nullable();
            $table->string('gps')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('commercial_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('professionnels');
    }
}
