<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Nette\Utils\Random;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $data = [];
        $Judulbuku = [
            'npm',
            'nidn',
            'nama'
        ];
        for ($i = 0; $i < 100; $i++) {

            $data[] = [
                'npm' => $faker->unique()->numberBetween(20124001, 20124100),
                'nidn' => DB::table('dosen')->inRandomOrder()->value('nidn'),
                'nama' => $faker->name(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('mahasiswa')->insert($data);
    }
}
