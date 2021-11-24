<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOjtMataKuliahEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ojt_mata_kuliah_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('id_ojt_event');
            $table->unsignedTinyInteger('id_ojt_mata_kuliah');
            $table->unsignedTinyInteger('id_prodi');
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
        Schema::dropIfExists('ojt_mata_kuliah_events');
    }
}
