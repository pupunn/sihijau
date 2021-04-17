<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $table = 'satuan';
    protected $primaryKey = "id_satuan";
    protected $guarded = [];

    public function indikators()
    {
        return $this->hasMany(Indikator::class, 'id_indikator');
    }

    public function sub_indikators()
    {
        return $this->hasMany(Sub_indikator::class, 'id_sub_indikator');
    }
}
