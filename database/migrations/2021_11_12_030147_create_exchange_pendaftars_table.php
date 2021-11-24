<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangePendaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('identity',30);
            $table->tinyInteger('status_kelulusan')->default(0);
            $table->boolean('status_pendaftaran')->default(false);
            $table->unsignedTinyInteger('id_exchange_tujuan');
            $table->tinyInteger('paket_exchange');
            $table->text('file');
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
        Schema::dropIfExists('exchange_pendaftars');
    }
}
