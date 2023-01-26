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
        Schema::create('particularorderlines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('particularorder_id')->unsigned();
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->integer('qte');
            $table->float('pu');
            $table->float('total');
            $table->foreign('product_id')->references('id')->on('produits')->onDelete('cascade');
            $table->foreign('particularorder_id')->references('id')->on('particularorders')->onDelete('cascade');
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
        Schema::dropIfExists('particularorderlines');
    }
};
