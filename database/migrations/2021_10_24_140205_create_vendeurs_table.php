<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendeurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('n_agrement');
            $table->string('date_expedition');
            $table->string('date_expiration');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        
        Schema::table('vendeurs', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
