<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('achat_id')->unsigned();
            $table->float('f');
            $table->float('d');
            $table->float('c');
            $table->float('s');
            $table->float('p');
            $table->float('w');
            $table->float('l');
            $table->float('t');
            $table->float('fp');
            $table->foreign('achat_id')->references('id')->on('achats')->onDelete('cascade');
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
        Schema::dropIfExists('analyses');
    }
}
