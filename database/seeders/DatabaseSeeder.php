<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'name' => 'Admin',
            'password' => Hash::make('password'),
            'user_level' => 'Admin'
        ]);
    }
}
