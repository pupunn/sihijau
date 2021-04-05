<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Juri',
            'email' => 'juri@mail.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('juri');

        $user = User::create([
            'name' => 'Operator Sekolah',
            'email' => 'os@mail.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('operator sekolah');
    }
}
