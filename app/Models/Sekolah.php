<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolah';

    protected $fillable = [
        "npsn",
        "file_npsn",
        "nama_sekolah",
        "alamat_sekolah",
        "nama_operator",
        "telepon_operator",
        "email_operator",
        "letak_sekolah",
        "file_peta_lokasi",
        "file_foto_sekolah",
        "luas_total",
        "file_masterplan",
        "luas_area",
        "file_luas_area",
        "luas_area_hijau",
        "file_luas_area_hijau",
        "jumlah_guru",
        "file_guru_karyawan",
        "jumlah_siswa",
        "file_jumlah_siswa",
    ];
}
