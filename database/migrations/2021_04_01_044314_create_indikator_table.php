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
            $table->string('nama_indikator');
            $table->integer('urutan');
            $table->integer('tahun');
            $table->enum('is_pilihan',['0','1']);
            $table->softDeletes();
            $table->timestamps();
            

            $table->foreignId('id_aspek');
            $table->foreignId('id_satuan');
            
            
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
