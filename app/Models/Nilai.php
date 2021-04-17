<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = "id_nilai";

    protected $guarded = ['id_nilai'];

    public function indikator()
    {
        return $this->belongsTo(Indikator::class, 'id_indikator');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id');
    }
}
