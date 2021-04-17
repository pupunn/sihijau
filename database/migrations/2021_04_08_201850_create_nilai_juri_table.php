<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiJuriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_juri', function (Blueprint $table) {
            $table->id('id_nilai_juri');
            $table->string('nilai');
            $table->softDeletes();
            $table->timestamps();

            $table->foreignId('id_indikator');
            $table->foreignId('id_sekolah');
            $table->foreignId('id_juri');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_juri');
    }
}
