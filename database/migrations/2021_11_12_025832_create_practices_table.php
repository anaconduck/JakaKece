<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practices', function (Blueprint $table) {
            $table->id();
            $table->text('teks')->nullable();
            $table->string('soal');
            $table->string('file',150)->nullable();
            $table->string('tipe',10);
            $table->string('opsi1');
            $table->string('opsi2');
            $table->string('opsi3');
            $table->string('opsi4');
            $table->tinyInteger('jawaban');
            $table->tinyInteger('id_course');
            $table->unsignedInteger('jumlah_pengerjaan');
            $table->unsignedInteger('jumlah_benar');
            $table->tinyInteger('sesi');
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
        Schema::dropIfExists('practices');
    }
}
