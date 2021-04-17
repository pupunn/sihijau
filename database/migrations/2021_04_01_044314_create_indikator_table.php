<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndikatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indikator', function (Blueprint $table) {
            $table->increments('id_indikator');
            $table->string('nama_indikator', 191);
            $table->string('urutan', 11);
            $table->integer('tahun');
            $table->string('template')->nullable();
            $table->softDeletes();
            $table->timestamps();


            $table->foreignId('id_aspek');
            $table->foreignId('id_satuan');
            $table->foreignId('id_periode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indikator');
    }
}
