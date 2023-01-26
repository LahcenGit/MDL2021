<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorie_id')->unsigned();
            $table->unsignedBigInteger('promo_id')->unsigned()->nullable();
            $table->string('designation');
            $table->string('type_emb')->nullable();
            $table->float('pu_ht');
            $table->string('dlc')->nullable();
            $table->string('bar_code')->nullable();
            $table->string('short_description')->nullable();
            $table->string('long_description')->nullable();
            $table->string('capacity')->nullable();
            $table->float('price')->nullable();
            $table->string('type')->nullable();
            $table->tinyInteger('flag')->nullable();
            $table->string('slug')->nullable();
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('promo_id')->references('id')->on('promos')->onDelete('cascade');
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
        Schema::dropIfExists('produits');
    }
}
