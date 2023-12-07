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
        Schema::create('lpc_ventes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lpc_client_id')->unsigned();
            $table->integer('qte');
            $table->integer('price');
            $table->integer('total');
            $table->string('destination')->nullable();
            $table->foreign('lpc_client_id')->references('id')->on('lpc_clients')->onDelete('cascade');
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
        Schema::dropIfExists('lpc_ventes');
    }
};
