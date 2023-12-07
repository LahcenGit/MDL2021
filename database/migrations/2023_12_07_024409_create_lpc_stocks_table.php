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
        Schema::create('lpc_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('PDL0');
            $table->string('PDL26');
            $table->integer('film');
            $table->tinyInteger('type');
            $table->tinyInteger('initial')->nullable();
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
        Schema::dropIfExists('lpc_stocks');
    }
};
