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
        Schema::create('lpc_productions', function (Blueprint $table) {
            $table->id();
            $table->string('LPC');
            $table->string('PDL0');
            $table->string('PDL26');
            $table->string('eau');
            $table->string('ms')->nullable();
            $table->integer('film');
            $table->string('lvc');
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
        Schema::dropIfExists('lpc_productions');
    }
};
