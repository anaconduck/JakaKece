<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawaraCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawara_centers', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->unsignedBigInteger('id_event_jawara');
            $table->json('data_mahasiswa');
            $table->boolean('ketersetujuan')->default(false);
            $table->unsignedBigInteger('id_dosen_pembimbing')->nullable();
            $table->string('predikat')->nullable();
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
        Schema::dropIfExists('jawara_centers');
    }
}
