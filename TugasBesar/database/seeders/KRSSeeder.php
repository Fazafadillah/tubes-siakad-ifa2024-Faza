<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KRSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $data = [];
        // $kelas = [
        //     'A',
        //     'B',
        //     'C',
        //     'D',
        //     'E'
        // ];
        // $hari = [
        //     'Senin',
        //     'Selasa',
        //     'Rabu',
        //     'Kamis',
        //     'Jumat',
        //     'Sabtu'
        // ];

        // for ($i = 0; $i < 36; $i++) {
        //     $data[] = [
        //         'npm' => DB::table('mahasiswa')->inRandomOrder()->value('npm'),
        //         'kode_matakuliah' => DB::table('matakuliah')->inRandomOrder()->value('kode_matakuliah'),
        //         'created_at' => now(),
        //         'updated_at' => now(),

        //     ];
        // }
        // DB::table('KRS')->insert($data);
        // // DB::table('KRS')->delete();
        // 1. Ambil semua NPM mahasiswa dan Kode Matakuliah yang tersedia di database
        $semuaMahasiswa = DB::table('mahasiswa')->pluck('npm');
        $semuaMatakuliah = DB::table('matakuliah')->pluck('kode_matakuliah');

        $data = [];

        // 2. Lakukan perulangan untuk SETIAP mahasiswa
        foreach ($semuaMahasiswa as $npm) {

            // Cek ketersediaan matakuliah (jaga-jaga jika total matkul di DB kurang dari 10)
            $jumlahMatkulYgDiambil = min(10, $semuaMatakuliah->count());

            if ($jumlahMatkulYgDiambil > 0) {
                // 3. Ambil 10 kode matakuliah secara acak (dan pasti tidak duplikat)
                $matkulAcak = $semuaMatakuliah->random($jumlahMatkulYgDiambil);

                // 4. Masukkan ke dalam array data
                foreach ($matkulAcak as $kode_mk) {
                    $data[] = [
                        'npm' => $npm,
                        'kode_matakuliah' => $kode_mk,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        // 5. Insert semua data sekaligus ke tabel KRS
        // Dipecah pakai chunk agar tidak berat jika datanya sangat banyak (misal ada 100 mhs * 10 = 1000 data)
        foreach (array_chunk($data, 500) as $chunk) {
            DB::table('krs')->insert($chunk); // Pastikan nama tabel sesuai, biasanya huruf kecil 'krs'
        }
    }
}
