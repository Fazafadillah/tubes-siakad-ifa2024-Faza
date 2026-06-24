<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswa = Mahasiswa::all();
        foreach ($mahasiswa as $mhs) {
            $formatemail = Str::slug($mhs->nama, '');
            $emailMahasiswa = $formatemail . '@student.unsur.ac.id';
            User::create([
                'name'     => $mhs->nama,
                'email'    => $emailMahasiswa,
                'password' => Hash::make('123456'),
                'role'     => 'Mahasiswa'
            ]);
        }
            User::create([
                'name'     => 'Admin',
                'email'    => 'admin@kampus.ac.id',
                'password' => Hash::make('123456'),
                'role'     => 'Admin'
            ]);
    }
}

