<?php

namespace Database\Seeders;

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
        \App\Models\User::firstOrCreate(
            ['email' => 'admin@alirsyad.sch.id'],
            [
                'name' => 'Admin Sarpras',
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ]
        );
    }
}
