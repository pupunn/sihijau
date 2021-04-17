<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    protected $table = 'bukti';
    protected $primaryKey = "id_bukti";

    protected $guarded = ['id_bukti'];

    public function indikator()
    {
        return $this->belongsTo(Indikator::class, 'id_indikator');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id');
    }
}
