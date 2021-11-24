<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeMataKuliahTujuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_mata_kuliah_tujuans', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('id_exchange_tujuan');
            $table->unsignedSmallInteger('id_exchange_mata_kuliah');
            $table->unsignedTinyInteger('paket');
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
        Schema::dropIfExists('exchange_mata_kuliah_tujuans');
    }
}
