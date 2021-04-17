<?php

namespace Database\Seeders;

use App\Models\Indikator;
use Illuminate\Database\Seeder;

class IndikatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Indikator::create([
            "nama_indikator" => "Rasio area terbuka terhadap total area sekolah",
            "urutan" => '1.1',
            "tahun" => 2020,
            "template" => "GSR_1_ 1_ Rasio area terbuka terhadap total area sekolah_ 1617865559.docx",
            "id_aspek" => 1,
            "id_satuan" => 1,
            "id_periode" => 1,
        ]);
    }
}
