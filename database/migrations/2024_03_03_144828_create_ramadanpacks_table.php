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
        Schema::create('ramadanpacks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('wilaya');
            $table->string('address');
            $table->string('phone');
            $table->string('note')->nullable();
            $table->integer('qte');
            $table->float('price');
            $table->integer('delivery_coast');
            $table->float('total');
            $table->string('code')->nullable();
            $table->tinyInteger('status');
            $table->tinyInteger('flag')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('ramadanpacks');
    }
};
