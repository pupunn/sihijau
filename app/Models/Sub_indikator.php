<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_indikator extends Model
{
    protected $table = 'sub_indikator';
    protected $primaryKey = 'id_sub_indikator';

    public function isians()
    {
        return $this->hasMany(Isian::class, 'id_isian');
    }

    public function indikator()
    {
        return $this->belongsTo(Indikator::class, 'id_indikator');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }
}
