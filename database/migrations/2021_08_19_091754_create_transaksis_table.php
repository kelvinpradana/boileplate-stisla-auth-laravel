<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diklat_id');
            $table->unsignedBigInteger('sub_diklat_id');
            $table->integer('jumlah');
            $table->string('tahun');
            $table->string('status');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // 
            $table->foreign('diklat_id')->references('id')->on('diklats');
            $table->foreign('sub_diklat_id')->references('id')->on('sub_diklats');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
