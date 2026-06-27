# Sistem Informasi Akademik (SIAKAD) — Laravel 12

> 🔗 **Link Project:** [http://unsurtubes.nfy.fyi/dashboard](http://unsurtubes.nfy.fyi/dashboard)

Sistem Informasi Akademik berbasis web yang dirancang untuk mengelola data master perkuliahan (Mahasiswa, Dosen, Mata Kuliah, Jadwal) serta transaksi Kartu Rencana Studi (KRS). Aplikasi ini mendukung multi-role (**Admin** & **Mahasiswa**) dengan fitur pembatasan hak akses, ringkasan statistik interaktif pada dashboard, serta fitur cetak laporan ke format PDF dan Excel.

---

## 🚀 Fitur Utama

### 1. Manajemen Hak Akses (Multi-Role Authentication)

- **Admin:** Memiliki akses penuh (CRUD) ke seluruh data master — Data Mahasiswa, Data Dosen, Data Mata Kuliah, dan Jadwal Perkuliahan.
- **Mahasiswa:** Memiliki akses terbatas untuk mengambil mata kuliah baru (Input KRS) dan membatalkan mata kuliah (Drop KRS).

### 2. Dashboard Statistik Dinamis

- **Tampilan Admin:** Menampilkan metrik total Mahasiswa Terdaftar, Dosen Pengajar, Mata Kuliah Tersedia, dan Total Transaksi KRS secara *real-time*.
- **Tampilan Mahasiswa:** Menampilkan sapaan personal sesuai nama akun dan total jumlah mata kuliah yang sedang diambil pada semester berjalan.

### 3. Keamanan & Filter KRS Personal

Sistem menggunakan jembatan relasi nama akun ke tabel mahasiswa untuk memproteksi data. Mahasiswa **hanya dapat melihat data KRS miliknya sendiri** dan tidak dapat memanipulasi NPM milik orang lain saat menginputkan KRS.

### 4. CRUDD (Mahasiswa, Dosen, Mata Kuliah, Jadwal)

Fitur pengelolaan data mencakup operasi **Create, Read, Update, Delete, dan Detail** untuk seluruh data master berikut:

- **Mahasiswa** 
- **Dosen** 
- **Mata Kuliah** 
- **Jadwal** 

### 5. Export Laporan (PDF & Excel)

Integrasi dengan **DomPDF** dan **Laravel Excel** memungkinkan:

- **Admin** mengunduh rekap keseluruhan data KRS.
- **Mahasiswa** mengunduh rekap KRS miliknya masing-masing.

Tersedia dalam format `.pdf` dan `.xlsx`.

---

## 🛠️ Prasyarat Sistem

Pastikan perangkat Anda memenuhi spesifikasi berikut sebelum menjalankan proyek:

| Komponen | Versi / Keterangan |
| :--- | :--- |
| PHP | `8.2` atau lebih baru |
| Framework | Laravel `12.x` |
| Database | MySQL / MariaDB |
| Composer | `2.8.5` |
| PHP Extension | **GD Extension** (wajib diaktifkan) |

> 💡 **PENTING:** Jika instalasi library gagal, buka file `php.ini`, cari baris `;extension=gd`, lalu hapus tanda titik koma (`;`) untuk mengaktifkannya:
>
> ```ini
> extension=gd
> ```

---

## 💾 Langkah Instalasi

### 1. Clone Repositori

```bash
git clone https://github.com/username/TugasSeeder.git
cd TugasSeeder
```

### 2. Install Dependensi Composer

Pastikan koneksi internet stabil. Composer akan mengunduh inti Laravel 12 beserta library pendukung (`maatwebsite/excel` & `barryvdh/laravel-dompdf`).

```bash
composer install
```

### 3. Konfigurasi Environment (.env)

Salin file `.env.example` menjadi `.env`:

```bash
copy .env.example .env
```

Buka file `.env` dan sesuaikan pengaturan database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Migrasi & Seed Database

Perintah berikut membuat tabel sekaligus mengisi data otomatis. `KRSSeeder` telah dikonfigurasi agar setiap mahasiswa mendapatkan minimal 10 data mata kuliah acak tanpa duplikat.

```bash
php artisan migrate:fresh --seed
```

### 6. Jalankan Server Lokal

```bash
php artisan serve
```

Buka browser dan akses: `http://localhost:8000`

---

## 🔐 Asal Akun

Data akun untuk role **Mahasiswa** diambil dari tabel mahasiswa. Akun **Admin** dibuat langsung melalui seeder.

> ⚠️ **PENTING:** Semua akun yang terdaftar menggunakan password default yang sama, yaitu: **`123456`**

---

## 👥 Akun Uji Coba (Credentials)

Setelah database seeding selesai, gunakan akun berikut untuk menguji perbedaan hak akses:

| Email | Password | Role | Deskripsi Fitur |
| :--- | :--- | :--- | :--- |
| `admin@kampus.ac.id` | `123456` | **Admin** | Dapat melihat dashboard penuh, CRUD data Mahasiswa, Dosen, Matkul, Jadwal, dan unduh rekap total KRS. |
| `rainavivimaryatisikom@student.unsur.ac.id` | `123456` | **Mahasiswa** | Dashboard personal, hanya melihat daftar KRS miliknya, mengambil matkul, dan unduh laporan KRS personal. |

---

## 🛡️ Akun Admin

| Nama | Email | Role |
| :--- | :--- | :--- |
| Admin | admin@kampus.ac.id | Admin |

---

## 🎓 Daftar Akun Mahasiswa

Semua akun mahasiswa menggunakan password: **`123456`**

| No | Nama | Email |
| :---: | :--- | :--- |
| 1 | Raina Vivi Maryati S.I.Kom | rainavivimaryatisikom@student.unsur.ac.id |
| 2 | Eka Rahimah | ekarahimah@student.unsur.ac.id |
| 3 | Elisa Zulfa Purnawati S.I.Kom | elisazulfapurnawatisikom@student.unsur.ac.id |
| 4 | Ella Nurdiyanti | ellanurdiyanti@student.unsur.ac.id |
| 5 | Nadia Yuniar S.Psi | nadiayuniarspsi@student.unsur.ac.id |
| 6 | Labuh Pradana | labuhpradana@student.unsur.ac.id |
| 7 | Himawan Kusumo | himawankusumo@student.unsur.ac.id |
| 8 | Ian Ramadan | ianramadan@student.unsur.ac.id |
| 9 | Heryanto Zulkarnain | heryantozulkarnain@student.unsur.ac.id |
| 10 | Gamani Thamrin S.Kom | gamanithamrinskom@student.unsur.ac.id |
| 11 | Padma Usada | padmausada@student.unsur.ac.id |
| 12 | Warta Kenzie Pranowo S.Psi | wartakenziepranowospsi@student.unsur.ac.id |
| 13 | Hamzah Uda Simanjuntak | hamzahudasimanjuntak@student.unsur.ac.id |
| 14 | Jumari Cahyo Anggriawan S.E. | jumaricahyoanggriawanse@student.unsur.ac.id |
| 15 | Malika Riyanti S.I.Kom | malikariyantisikom@student.unsur.ac.id |
| 16 | Lalita Utami | lalitautami@student.unsur.ac.id |
| 17 | Arsipatra Umar Setiawan M.M. | arsipatraumarsetiawanmm@student.unsur.ac.id |
| 18 | Cawisadi Hendra Anggriawan S.Gz | cawisadihendraanggriawansgz@student.unsur.ac.id |
| 19 | Nova Julia Kusmawati | novajuliakusmawati@student.unsur.ac.id |
| 20 | Sakura Yuniar | sakurayuniar@student.unsur.ac.id |
| 21 | Indra Simanjuntak | indrasimanjuntak@student.unsur.ac.id |
| 22 | Danuja Endra Maulana | danujaendramaulana@student.unsur.ac.id |
| 23 | Wulan Rahimah | wulanrahimah@student.unsur.ac.id |
| 24 | Ana Chelsea Yuniar M.Farm | anachelseayuniarmfarm@student.unsur.ac.id |
| 25 | Surya Maheswara M.TI. | suryamaheswaramti@student.unsur.ac.id |
| 26 | Rini Purnawati S.Gz | rinipurnawatisgz@student.unsur.ac.id |
| 27 | Gilang Prasetya | gilangprasetya@student.unsur.ac.id |
| 28 | Jayadi Prasasta | jayadiprasasta@student.unsur.ac.id |
| 29 | Prayogo Suryono S.Pd | prayogosuryonospd@student.unsur.ac.id |
| 30 | Vivi Riyanti | viviriyanti@student.unsur.ac.id |
| 31 | Xanana Pratama | xananapratama@student.unsur.ac.id |
| 32 | Gatot Ganda Santoso | gatotgandasantoso@student.unsur.ac.id |
| 33 | Kasiran Emas Hardiansyah M.Farm | kasiranemashardiansyahmfarm@student.unsur.ac.id |
| 34 | Rini Utami | riniutami@student.unsur.ac.id |
| 35 | Viman Dabukke | vimandabukke@student.unsur.ac.id |
| 36 | Hani Kani Laksmiwati M.Kom. | hanikanilaksmiwatimkom@student.unsur.ac.id |
| 37 | Ibun Prasetyo | ibunprasetyo@student.unsur.ac.id |
| 38 | Kuncara Siregar M.M. | kuncarasiregarmm@student.unsur.ac.id |
| 39 | Ani Melani | animelani@student.unsur.ac.id |
| 40 | Kiandra Michelle Farida S.Kom | kiandramichellefaridaskom@student.unsur.ac.id |
| 41 | Endra Ikhsan Saptono | endraikhsansaptono@student.unsur.ac.id |
| 42 | Zulaikha Mayasari | zulaikhamayasari@student.unsur.ac.id |
| 43 | Mulyono Anom Prakasa S.I.Kom | mulyonoanomprakasasikom@student.unsur.ac.id |
| 44 | Ghaliyati Novitasari | ghaliyatinovitasari@student.unsur.ac.id |
| 45 | Anastasia Jelita Usamah | anastasiajelitausamah@student.unsur.ac.id |
| 46 | Rahmi Susanti S.H. | rahmisusantish@student.unsur.ac.id |
| 47 | Jasmin Suartini | jasminsuartini@student.unsur.ac.id |
| 48 | Jamil Sihombing | jamilsihombing@student.unsur.ac.id |
| 49 | Tina Puji Rahmawati S.Gz | tinapujirahmawatisgz@student.unsur.ac.id |
| 50 | Martaka Samosir | martakasamosir@student.unsur.ac.id |
| 51 | Lurhur Prasetyo | lurhurprasetyo@student.unsur.ac.id |
| 52 | Paulin Fujiati | paulinfujiati@student.unsur.ac.id |
| 53 | Zalindra Usamah S.IP | zalindrausamahsip@student.unsur.ac.id |
| 54 | Eva Lestari | evalestari@student.unsur.ac.id |
| 55 | Jaka Mansur | jakamansur@student.unsur.ac.id |
| 56 | Cahyanto Jaiman Habibi M.TI. | cahyantojaimanhabibimti@student.unsur.ac.id |
| 57 | Rahmi Hartati | rahmihartati@student.unsur.ac.id |
| 58 | Maida Rahmawati | maidarahmawati@student.unsur.ac.id |
| 59 | Harsaya Sirait S.Gz | harsayasiraitsgz@student.unsur.ac.id |
| 60 | Zamira Rahayu S.Sos | zamirarahayussos@student.unsur.ac.id |
| 61 | Yuni Farida | yunifarida@student.unsur.ac.id |
| 62 | Jaiman Panji Simanjuntak S.Farm | jaimanpanjisimanjuntaksfarm@student.unsur.ac.id |
| 63 | Cahya Manullang | cahyamanullang@student.unsur.ac.id |
| 64 | Viktor Firmansyah | viktorfirmansyah@student.unsur.ac.id |
| 65 | Cemplunk Prabowo | cemplunkprabowo@student.unsur.ac.id |
| 66 | Yuliana Lailasari | yulianalailasari@student.unsur.ac.id |
| 67 | Lembah Samosir | lembahsamosir@student.unsur.ac.id |
| 68 | Janet Rahmawati S.Psi | janetrahmawatispsi@student.unsur.ac.id |
| 69 | Hilda Wastuti S.Gz | hildawastutisgz@student.unsur.ac.id |
| 70 | Lasmanto Firmansyah | lasmantofirmansyah@student.unsur.ac.id |
| 71 | Darijan Hardiansyah S.T. | darijanhardiansyahst@student.unsur.ac.id |
| 72 | Sabar Bajragin Sihombing | sabarbajraginsihombing@student.unsur.ac.id |
| 73 | Jelita Usyi Fujiati | jelitausyifujiati@student.unsur.ac.id |
| 74 | Hesti Ayu Rahayu | hestiayurahayu@student.unsur.ac.id |
| 75 | Mustofa Jailani | mustofajailani@student.unsur.ac.id |
| 76 | Edi Budiyanto | edibudiyanto@student.unsur.ac.id |
| 77 | Olga Soleh Habibi | olgasolehhabibi@student.unsur.ac.id |
| 78 | Tari Purwanti | taripurwanti@student.unsur.ac.id |
| 79 | Kamidin Tirtayasa Kusumo | kamidintirtayasakusumo@student.unsur.ac.id |
| 80 | Jessica Andriani S.I.Kom | jessicaandrianisikom@student.unsur.ac.id |
| 81 | Jamalia Pertiwi | jamaliapertiwi@student.unsur.ac.id |
| 82 | Rafi Taswir Situmorang S.E.I | rafitaswirsitumorangsei@student.unsur.ac.id |
| 83 | Muhammad Nardi Thamrin | muhammadnardithamrin@student.unsur.ac.id |
| 84 | Keisha Padmasari | keishapadmasari@student.unsur.ac.id |
| 85 | Ikin Marsito Prakasa M.TI. | ikinmarsitoprakasamti@student.unsur.ac.id |
| 86 | Cakrawangsa Thamrin | cakrawangsathamrin@student.unsur.ac.id |
| 87 | Irma Widiastuti | irmawidiastuti@student.unsur.ac.id |
| 88 | Among Niyaga Megantara | amongniyagamegantara@student.unsur.ac.id |
| 89 | Yosef Firmansyah S.IP | yoseffirmansyahsip@student.unsur.ac.id |
| 90 | Cecep Balamantri Gunarto | cecepbalamantrigunarto@student.unsur.ac.id |
| 91 | Fitria Usada | fitriausada@student.unsur.ac.id |
| 92 | Bahuwarna Najmudin | bahuwarnanajmudin@student.unsur.ac.id |
| 93 | Zelaya Riyanti | zelayariyanti@student.unsur.ac.id |
| 94 | Kayla Violet Wahyuni S.Gz | kaylavioletwahyunisgz@student.unsur.ac.id |
| 95 | Putri Nurdiyanti | putrinurdiyanti@student.unsur.ac.id |
| 96 | Adiarja Upik Salahudin | adiarjaupiksalahudin@student.unsur.ac.id |
| 97 | Argono Dongoran | argonodongoran@student.unsur.ac.id |
| 98 | Jagapati Halim | jagapatihalim@student.unsur.ac.id |
| 99 | Silvia Kuswandari | silviakuswandari@student.unsur.ac.id |
| 100 | Karta Saputra | kartasaputra@student.unsur.ac.id |

**Catatan Akun Diatas Hanya Untuk Masuk/Login Di Link Project**
