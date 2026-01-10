<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::factory()->create([
            'name' => 'Admin Klinik',
            'email' => 'admin@kliniksehat.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'phone' => '08123456789',
            'address' => 'Jl. Kesehatan No. 123, Jakarta Selatan',
        ]);

        // Create Test Patient User
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'patient@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
            'phone' => '08123456780',
            'date_of_birth' => '1990-05-15',
            'address' => 'Jl. Contoh No. 45, Jakarta Pusat',
        ]);

        // Seed Poli dan Dokter
        $this->call([
            PoliSeeder::class,
            DoctorSeeder::class,
        ]);
    }
}
