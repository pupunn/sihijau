<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->increments('id_nilai');
            $table->integer('id_unit');
            $table->integer('nilai');
            $table->integer('nilai_juri')->nullable();
            $table->integer('id_penilai')->nullable();
            $table->integer('tahun');
            $table->softDeletes();
            $table->timestamps();
            

            $table->foreignId('id_indikator');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai');
    }
}
