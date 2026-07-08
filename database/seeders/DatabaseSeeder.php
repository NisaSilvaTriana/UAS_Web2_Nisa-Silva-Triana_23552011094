<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Penting untuk mengenali fungsi enkripsi password

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat akun admin SDN Kulinyar
        User::create([
            'name' => 'Website Sekolah',
            'email' => 'website@gmail.com',
            'password' => Hash::make('123'), // Password dienkripsi agar aman
        ]);
    }
}