<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->integer('npsn');
            $table->string('file_npsn')->nullable();
            $table->string('nama_sekolah');
            $table->string('alamat_sekolah');
            $table->string('nama_operator');
            $table->integer('telepon_operator');
            $table->string('email_operator')->unique();
            $table->enum('letak_sekolah', ['1', '2', '3']);
            $table->string('file_peta_lokasi')->nullable();
            $table->string('file_foto_sekolah')->nullable();
            $table->integer('luas_total');
            $table->string('file_masterplan')->nullable();
            $table->integer('luas_area');
            $table->string('file_luas_area')->nullable();
            $table->integer('luas_area_hijau');
            $table->string('file_luas_area_hijau')->nullable();
            $table->integer('jumlah_guru');
            $table->string('file_guru_karyawan')->nullable();
            $table->integer('jumlah_siswa');
            $table->string('file_jumlah_siswa')->nullable();
            $table->boolean('is_confirmed')->default('0');
            $table->softDeletes();
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
        Schema::dropIfExists('sekolah');
    }
}
