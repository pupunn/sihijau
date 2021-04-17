<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periode';
    protected $primaryKey = "id_periode";

    public function indikators()
    {
        return $this->hasMany(Indikator::class, 'id_indikator');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id');
    }
}
