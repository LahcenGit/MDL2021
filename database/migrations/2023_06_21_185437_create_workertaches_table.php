<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workertaches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('worker_id')->unsigned()->nullable();
            $table->unsignedBigInteger('tache_id')->unsigned()->nullable();
            $table->integer('note')->nullable();
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');
            $table->foreign('tache_id')->references('id')->on('taches')->onDelete('cascade');
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
        Schema::dropIfExists('workertaches');
    }
};
