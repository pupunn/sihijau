<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isian', function (Blueprint $table) {
            $table->increments('id_isian');
            $table->string('isian');
            $table->integer('tahun');
            $table->softDeletes();
            $table->timestamps();
            

            $table->foreignId('id_sub_indikator');
            $table->foreignId('id_sekolah');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isian');
    }
}
