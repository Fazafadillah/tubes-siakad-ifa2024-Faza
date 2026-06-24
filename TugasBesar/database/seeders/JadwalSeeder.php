<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $data = [];
        $kelas = [
            'A',
            'B',
            'C',
            'D',
            'E'
        ];
        $hari = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu'
        ];

        for ($i = 0; $i < 36; $i++) {
            $data[] = [
                'kode_matakuliah' => DB::table('matakuliah')->inRandomOrder()->value('kode_matakuliah'),
                'nidn' => DB::table('dosen')->inRandomOrder()->value('nidn'),
                'kelas' => $faker->randomElement($kelas),
                'hari' => $faker->randomElement($hari),
                'jam' => $faker->dateTimeBetween('08:00:00', '14:00:00'),
                'created_at' => now(),
                'updated_at' => now(),

            ];
        }
        DB::table('Jadwal')->insert($data);
        // DB::table('Jadwal')->delete();
    }
}
