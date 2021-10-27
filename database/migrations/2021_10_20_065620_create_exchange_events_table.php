<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_events', function (Blueprint $table) {
            $table->id();
            $table->string('nama_universitas');
            $table->string('nama_fakultas');
            $table->string('status_akreditasi',2);
            $table->dateTime('mulai');
            $table->dateTime('akhir');
            $table->longText('persyaratan');
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
        Schema::dropIfExists('exchange_events');
    }
}
