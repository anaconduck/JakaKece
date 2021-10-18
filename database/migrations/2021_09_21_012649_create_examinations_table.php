<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
            $table->id();
            $table->string('jawaban');
            $table->string('type');
            $table->string('kategori');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('id_course');
            $table->string('nomor_ujian');
            $table->string('kode_ujian');
            $table->unsignedBigInteger('history_exam_id');
            $table->integer('tes_ke')->default(1);
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
        Schema::dropIfExists('examinations');
    }
}
