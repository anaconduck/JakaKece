<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawaraEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawara_events', function (Blueprint $table) {
            $table->id();
            $table->string('nama',50);
            $table->string('file');
            $table->unsignedTinyInteger('max_anggota')->default(1);
            $table->date('mulai_daftar');
            $table->date('akhir_daftar');
            $table->dateTime('mulai');
            $table->boolean('finish')->default(false);
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
        Schema::dropIfExists('jawara_events');
    }
}
