<?php

namespace Database\Seeders;

use App\Models\Kriteria_penilaian;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kriteria_penilaian::create([
            'id_indikator' => 1,
            'kriteria' => '<20%',
            'bobot' => 1,
        ]);

        Kriteria_penilaian::create([
            'id_indikator' => 1,
            'kriteria' => '20%-35%',
            'bobot' => 2,
        ]);

        Kriteria_penilaian::create([
            'id_indikator' => 1,
            'kriteria' => '>35%-50%',
            'bobot' => 3,
        ]);

        Kriteria_penilaian::create([
            'id_indikator' => 1,
            'kriteria' => '>50%',
            'bobot' => 4,
        ]);
    }
}
