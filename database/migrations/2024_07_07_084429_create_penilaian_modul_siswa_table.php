<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianModulSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_modul_siswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('modul_id')->unsigned();
            $table->bigInteger('siswa_id')->unsigned();
            $table->boolean('is_upload_tugas');
            $table->timestamps();
            $table->text('source');
            $table->text('output');
            $table->integer('attempt');
            $table->integer('answered_time')->nullable();
            $table->integer('point');
            $table->text('raw_result');

            // Menambahkan kunci asing
            $table->foreign('modul_id')->references('id')->on('modul')->onDelete('cascade');
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian_modul_siswa');
    }
}
