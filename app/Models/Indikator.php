<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $table = 'indikator';
    protected $primaryKey = "id_indikator";

    protected $guarded = [];

    public function aspek()
    {
        return $this->belongsTo(Aspek::class, 'id_aspek');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode');
    }

    public function sub_indikators()
    {
        return $this->hasMany(Sub_indikator::class, 'id_sub_indikator');
    }

    public function kriteria()
    {
        return $this->hasMany(Kriteria_penilaian::class, 'id_kriteria');
    }

    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'id_nilai');
    }

    public function buktis()
    {
        return $this->hasMany(Bukti::class, 'id_bukti');
    }

    public function nilai_juris()
    {
        return $this->hasMany(Nilai_juri::class, 'id_indikator');
    }
}
