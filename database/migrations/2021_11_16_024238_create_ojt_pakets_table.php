<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOjtPaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ojt_pakets', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('id_ojt_tujuan');
            $table->unsignedSmallInteger('id_ojt_event');
            $table->date('mulai_daftar');
            $table->date('akhir_daftar');
            $table->date('mulai_training');
            $table->date('akhir_training');
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
        Schema::dropIfExists('ojt_pakets');
    }
}
