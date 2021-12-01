<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOjtPendaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ojt_pendaftars', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('id_prodi');
            $table->unsignedInteger('id_paket');
            $table->string('identity',30);
            $table->boolean('status_pendaftaran')->default(false);
            $table->boolean('status_kelulusan')->default(false);
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
        Schema::dropIfExists('ojt_pendaftars');
    }
}
