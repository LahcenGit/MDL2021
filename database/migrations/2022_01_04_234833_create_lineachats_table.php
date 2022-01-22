<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineachatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineachats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('achat_id')->unsigned();
            $table->unsignedBigInteger('breeder_id')->unsigned();
            $table->string('price');
            $table->integer('qte');
            $table->string('total');
            $table->string('balance')->nullable();
            $table->foreign('achat_id')->references('id')->on('achats')->onDelete('cascade');
            $table->foreign('breeder_id')->references('id')->on('breeders')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('lineachats');
    }
}
