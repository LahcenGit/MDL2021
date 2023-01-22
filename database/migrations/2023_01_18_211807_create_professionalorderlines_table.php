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
        Schema::create('professionalorderlines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('professionalorder_id')->unsigned();
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->integer('qte');
            $table->float('pu');
            $table->float('total');
            $table->foreign('product_id')->references('id')->on('produits')->onDelete('cascade');
            $table->foreign('professionalorder_id')->references('id')->on('professionalorders')->onDelete('cascade');
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
        Schema::dropIfExists('professionalorderlines');
    }
};
