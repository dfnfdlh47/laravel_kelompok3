<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'username' => 'admin_futsal',
            'email' => 'admin@gmail.com',
            'no_hp' => '081234567890',    // <-- Ubah 'phone' menjadi 'no_hp' di sini
            'password' => Hash::make('123456'), 
            'role' => 'admin', 
        ]);
    }
}