<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

use function Symfony\Component\Clock\now;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $data = [];
        $NamaMatkul = [
            'Algoritma dan Pemrograman',
            'Struktur Data',
            'Basis Data',
            'Sistem Operasi',
            'Jaringan Komputer',
            'Pemrograman Web',
            'Pemrograman Mobile',
            'Rekayasa Perangkat Lunak',
            'Analisis dan Perancangan Sistem',
            'Kecerdasan Buatan',
            'Machine Learning',
            'Data Mining',
            'Big Data',
            'Cloud Computing',
            'Keamanan Informasi',
            'Kriptografi',
            'Interaksi Manusia dan Komputer',
            'Grafika Komputer',
            'Pengolahan Citra Digital',
            'Pemrograman Berorientasi Objek',
            'Pemrograman Lanjut',
            'Matematika Diskrit',
            'Aljabar Linear',
            'Kalkulus I',
            'Kalkulus II',
            'Statistika dan Probabilitas',
            'Metode Numerik',
            'Sistem Basis Data Lanjut',
            'Administrasi Basis Data',
            'Sistem Terdistribusi',
            'Internet of Things',
            'Embedded System',
            'Pemrograman Game',
            'Pengembangan Aplikasi Enterprise',
            'Manajemen Proyek TI',
            'Audit Sistem Informasi',
            'Etika Profesi TI',
            'Sistem Informasi Manajemen',
            'E-Business',
            'E-Commerce',
            'Decision Support System',
            'Business Intelligence',
            'Pengolahan Bahasa Alami',
            'Deep Learning',
            'Computer Vision',
            'Robotika',
            'Augmented Reality',
            'Virtual Reality',
            'Blockchain',
            'DevOps',
            'Software Testing',
            'Quality Assurance',
            'UI/UX Design',
            'Human Centered Design',
            'Teknologi Multimedia',
            'Animasi Komputer',
            'Desain Grafis',
            'Pengantar Teknologi Informasi',
            'Pengantar Ilmu Komputer',
            'Logika Informatika',
            'Sistem Digital',
            'Arsitektur Komputer',
            'Mikroprosesor',
            'Pemrograman Python',
            'Pemrograman Java',
            'Pemrograman PHP',
            'Pemrograman JavaScript',
            'Framework Web',
            'Laravel Framework',
            'React JS',
            'Vue JS',
            'Pengujian Perangkat Lunak',
            'Manajemen Basis Data',
            'Data Warehouse',
            'Information Retrieval',
            'Bioinformatika',
            'Sistem Pakar',
            'Simulasi dan Pemodelan',
            'Komputasi Paralel',
            'High Performance Computing',
            'Teknologi Jaringan Nirkabel',
            'Administrasi Sistem',
            'Linux Server',
            'Windows Server',
            'Keamanan Jaringan',
            'Penetration Testing',
            'Digital Forensik',
            'Etika Hacker',
            'Pemrograman Fungsional',
            'Pemrograman Reaktif',
            'API Development',
            'Microservices Architecture',
            'Containerization dengan Docker',
            'Kubernetes',
            'Serverless Computing',
            'Startup Digital',
            'Technopreneurship',
            'Manajemen Inovasi',
            'Kewirausahaan TI',
            'Metodologi Penelitian',
            'Skripsi',
            'Kerja Praktik',
            'Kuliah Kerja Nyata',
        ];

        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'kode_matakuliah' => $faker->unique()->numerify('IF#####'),
                'nama_matakuliah' => $faker->unique()->randomElement($NamaMatkul),
                'sks' => $faker->numberBetween(2, 3),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('MataKuliah')->insert($data);
        // DB::table('MataKuliah')->delete();
    }
}
