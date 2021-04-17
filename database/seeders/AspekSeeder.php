<?php

namespace Database\Seeders;

use App\Models\Aspek;
use Illuminate\Database\Seeder;

class AspekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aspek::create([
            'nama_aspek' => 'Tapak dan Infrastruktur',
            'tahun' => 2021
        ]);
    }
}
