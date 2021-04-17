<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Isian extends Model
{
    protected $table = 'isian';
    protected $primaryKey = "id_isian";

    protected $guarded = ['id_isian'];

    public function sub_indikator()
    {
        return $this->belongsTo(Sub_indikator::class, 'id_sub_indikator');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id');
    }
}
