<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = [
            // Poli Umum
            [
                'name' => 'Dr. Ahmad Santoso, Sp.PD',
                'poli_id' => 1,
                'schedule_day' => 'Monday',
                'start_time' => '08:00:00',
                'end_time' => '14:00:00',
                'specialization' => 'Spesialis Penyakit Dalam',
                'phone' => '08123456701',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Siti Nurhaliza, Sp.PD',
                'poli_id' => 1,
                'schedule_day' => 'Wednesday',
                'start_time' => '08:00:00',
                'end_time' => '14:00:00',
                'specialization' => 'Spesialis Penyakit Dalam',
                'phone' => '08123456702',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Budi Hartono',
                'poli_id' => 1,
                'schedule_day' => 'Friday',
                'start_time' => '13:00:00',
                'end_time' => '18:00:00',
                'specialization' => 'Dokter Umum',
                'phone' => '08123456703',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Poli Gigi
            [
                'name' => 'Drg. Lisa Permata',
                'poli_id' => 2,
                'schedule_day' => 'Tuesday',
                'start_time' => '09:00:00',
                'end_time' => '15:00:00',
                'specialization' => 'Dokter Gigi',
                'phone' => '08123456704',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Drg. Andi Wijaya, Sp.KG',
                'poli_id' => 2,
                'schedule_day' => 'Thursday',
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
                'specialization' => 'Spesialis Konservasi Gigi',
                'phone' => '08123456705',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Poli Anak
            [
                'name' => 'Dr. Siti Rahmawati, Sp.A',
                'poli_id' => 3,
                'schedule_day' => 'Monday',
                'start_time' => '10:00:00',
                'end_time' => '16:00:00',
                'specialization' => 'Spesialis Anak',
                'phone' => '08123456706',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Dewi Lestari, Sp.A',
                'poli_id' => 3,
                'schedule_day' => 'Wednesday',
                'start_time' => '08:00:00',
                'end_time' => '14:00:00',
                'specialization' => 'Spesialis Anak',
                'phone' => '08123456707',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Poli Mata
            [
                'name' => 'Dr. Budi Hartono, Sp.M',
                'poli_id' => 4,
                'schedule_day' => 'Tuesday',
                'start_time' => '08:00:00',
                'end_time' => '12:00:00',
                'specialization' => 'Spesialis Mata',
                'phone' => '08123456708',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Maya Sari, Sp.M',
                'poli_id' => 4,
                'schedule_day' => 'Friday',
                'start_time' => '13:00:00',
                'end_time' => '17:00:00',
                'specialization' => 'Spesialis Mata',
                'phone' => '08123456709',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Poli THT
            [
                'name' => 'Dr. Rahman Hakim, Sp.THT',
                'poli_id' => 5,
                'schedule_day' => 'Monday',
                'start_time' => '08:00:00',
                'end_time' => '14:00:00',
                'specialization' => 'Spesialis THT',
                'phone' => '08123456710',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Rina Melati, Sp.THT',
                'poli_id' => 5,
                'schedule_day' => 'Thursday',
                'start_time' => '10:00:00',
                'end_time' => '16:00:00',
                'specialization' => 'Spesialis THT',
                'phone' => '08123456711',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('doctors')->insert($doctors);
    }
}
