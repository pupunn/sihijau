<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaPenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria_penilaian', function (Blueprint $table) {
            $table->increments('id_kriteria');
            $table->integer('id_indikator')->unsigned();
            $table->string('kriteria');
            $table->integer('bobot');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_indikator')->references('id_indikator')->on('indikator')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriteria_penilaian');
    }
}
