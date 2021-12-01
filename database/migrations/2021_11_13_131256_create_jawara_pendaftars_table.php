<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawaraPendaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawara_pendaftars', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->unsignedBigInteger('id_jawara_event');
            $table->string('id_mahasiswa');
            $table->string('id_dosen', 50);
            $table->string('status',10)->default('0');
            $table->string('file')->nullable();
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
        Schema::dropIfExists('jawara_pendaftars');
    }
}
