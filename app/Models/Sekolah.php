<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolah';
    protected $primary_key = 'id';

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

    public function users()
    {
        return $this->hasMany(User::class, 'id');
    }

    public function isians()
    {
        return $this->hasMany(Isian::class, 'id_isian');
    }

    public function buktis()
    {
        return $this->hasMany(Bukti::class, 'id_bukti');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_sekolah');
    }

    public function nilai_juris()
    {
        return $this->hasMany(Nilai_juri::class, 'id_sekolah');
    }
}
