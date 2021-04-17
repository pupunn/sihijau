<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai_juri extends Model
{
    protected $table = 'nilai_juri';
    protected $primaryKey = "id_nilai_juri";

    protected $guarded = ['id_nilai_juri'];

    public function indikator()
    {
        return $this->belongsTo(Indikator::class, 'id_indikator');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_juri');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id');
    }
}
