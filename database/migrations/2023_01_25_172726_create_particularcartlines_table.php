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
        Schema::create('particularcartlines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('particularcart_id')->unsigned();
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->integer('qte');
            $table->float('pu');
            $table->float('total');
            $table->foreign('particularcart_id')->references('id')->on('particularcarts')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('produits')->onDelete('cascade');
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
        Schema::dropIfExists('particularcartlines');
    }
};
