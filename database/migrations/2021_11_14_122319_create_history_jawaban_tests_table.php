<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryJawabanTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_jawaban_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_history_test');
            $table->string('daftar_soal');
            $table->string('daftar_jawaban');
            $table->string('jumlah_benar');
            $table->unsignedTinyInteger('sesi');
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
        Schema::dropIfExists('history_jawaban_tests');
    }
}
