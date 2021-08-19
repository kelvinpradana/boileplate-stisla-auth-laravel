<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubDiklatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_diklats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diklat_id');
            $table->string('nama');
            $table->foreign('diklat_id')->references('id')->on('diklats');
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
        Schema::dropIfExists('sub_diklats');
    }
}
