<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('password')
        ]);

        User::create([
            'nama' => 'Dokter',
            'username' => 'dokter',
            'email' => 'dokter@gmail.com',
            'role' => 'dokter',
            'password' => Hash::make('password')
        ]);

        User::create([
            'nama' => 'Joy',
            'username' => 'joy',
            'email' => 'joy@gmail.com',
            'role' => 'pengguna',
            'password' => Hash::make('password')
        ]);
    }
}
