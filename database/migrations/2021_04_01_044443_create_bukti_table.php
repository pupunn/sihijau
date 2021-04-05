<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuktiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukti', function (Blueprint $table) {
            $table->increments('id_bukti');
            $table->string('path');
            $table->text('deskripsi');
            $table->string('filetype');
            $table->softDeletes();
            $table->timestamps();
            

            $table->foreignId('id_indikator');
            $table->foreignId('id_unit');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukti');
    }
}
