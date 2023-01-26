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
        Schema::create('particularorders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('particular_id')->unsigned();
            $table->string('wilaya')->nullable();
            $table->string('address');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('note')->nullable();
            $table->float('total');
            $table->tinyInteger('status');
            $table->float('discount')->nullable();
            $table->tinyInteger('flag')->nullable();
            $table->string('slug')->nullable();
            $table->foreign('particular_id')->references('id')->on('particuliers')->onDelete('cascade');
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
        Schema::dropIfExists('particularorders');
    }
};
