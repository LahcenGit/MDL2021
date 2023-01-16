<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreedersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breeders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collector_id')->unsigned();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('agrement_type')->nullable();
            $table->string('n_agrement')->nullable();
            $table->string('subscription_date')->nullable();
            $table->string('expiration_date')->nullable();
            $table->string('delivry_date')->nullable();
            $table->string('balance')->nullable();
            $table->string('slug')->nullable();
            $table->string('flug')->nullable();
            $table->foreign('collector_id')->references('id')->on('collectors')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('breeders');
    }
}
