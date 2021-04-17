<?php

namespace Database\Seeders;

use App\Models\Periode;
use Illuminate\Database\Seeder;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periode::create([
            'nama' => 'Juni 2021',
            'kode' => 'P1',
            'date_close' => 20210714,
            'is_default' => 1
        ]);
    }
}
