<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubIndikatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_indikator', function (Blueprint $table) {
            $table->increments('id_sub_indikator');
            $table->integer('id_indikator')->unsigned();
            $table->integer('id_satuan')->unsigned();
            $table->string('nama_sub_indikator');
            $table->integer('urutan');
            $table->integer('tahun');
            $table->enum('is_pembagi', ['0', '1']);
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('id_indikator')->references('id_indikator')->on('indikator')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_satuan')->references('id_satuan')->on('satuan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_indikator');
    }
}
