<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@szkdvendeghaz.hu',
            'name' => 'Admin',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'admin' => true
        ]);

    }
}
