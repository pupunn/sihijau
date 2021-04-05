<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'juri',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'operator sekolah',
            'guard_name' => 'web'
        ]);
    }
}
