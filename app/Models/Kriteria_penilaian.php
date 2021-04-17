<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria_penilaian extends Model
{
    protected $table = 'kriteria_penilaian';
    protected $primaryKey = "id_kriteria";

    protected $guarded = [];

    public function indikator()
    {
        return $this->belongsTo(Indikator::class, 'id_indikator');
    }
}
