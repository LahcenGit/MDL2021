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
        Schema::create('professionalorders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('professional_id')->unsigned();
            $table->string('note')->nullable();
            $table->float('total');
            $table->tinyInteger('status');
            $table->tinyInteger('flag');
            $table->string('slug')->nullable();
            $table->foreign('professional_id')->references('id')->on('professionnels')->onDelete('cascade');
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
        Schema::dropIfExists('professionalorders');
    }
};
