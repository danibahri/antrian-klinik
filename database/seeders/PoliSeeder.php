<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $polis = [
            [
                'name' => 'Poli Umum',
                'description' => 'Pelayanan kesehatan umum untuk berbagai keluhan dan penyakit ringan hingga sedang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Poli Gigi',
                'description' => 'Pelayanan kesehatan gigi dan mulut termasuk perawatan gigi berlubang, scaling, dan cabut gigi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Poli Anak',
                'description' => 'Pelayanan kesehatan khusus untuk bayi, anak, dan remaja termasuk imunisasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Poli Mata',
                'description' => 'Pelayanan kesehatan mata termasuk pemeriksaan visus dan penanganan gangguan mata',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Poli THT',
                'description' => 'Pelayanan kesehatan Telinga, Hidung, dan Tenggorokan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('polis')->insert($polis);
    }
}
