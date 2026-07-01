<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::updateOrCreate(
            ['email' => 'adminal-irsyad@gmail.com'],
            [
                'name' => 'Admin Sarpras',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ]
        );
    }
}
