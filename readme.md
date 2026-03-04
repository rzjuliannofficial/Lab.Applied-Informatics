# Lab Applied Informatics - Web Portal & Admin Panel

## 🔗 Akses Langsung 

Link : [Laboratorium Applied Informatics](https://appliedinformaticspolinema.alwaysdata.net/)

## 👥 Anggota Project
1. Kamila Zahwa
2. Muhammad Zuhdi
3. Nabhan Rizqi Julian Saputro 
4. Otavia Ulandari

## 📖 Tentang Proyek

Repositori ini berisi *source code* untuk sistem informasi Laboratorium Applied Informatics, Politeknik Negeri Malang. Sistem ini dirancang untuk menjadi pusat informasi publik mengenai aktivitas laboratorium sekaligus platform manajemen internal bagi dosen dan asisten lab.

Dibangun dengan pendekatan **Custom MVC (Model-View-Controller)** menggunakan PHP Native, sistem ini menawarkan performa yang ringan, keamanan data yang terstruktur dengan PostgreSQL, dan antarmuka modern yang responsif.

## ✨ Fitur Utama

### 🌐 Public Website (Frontend)
* **Landing Page Modern:** Menampilkan profil lab, visi misi, dan *showcase* produk unggulan.
* **Galeri Dinamis:** Menampilkan dokumentasi kegiatan secara *masonry layout* yang responsif.
* **Profil Anggota:** Daftar dosen dan tim peneliti beserta keahlian dan publikasinya.
* **Berita & Artikel:** Informasi terkini seputar kegiatan akademik dan prestasi lab.
* **Partner Showcase:** Menampilkan mitra industri dan akademik yang bekerja sama dengan lab.

### 🛡️ Admin Panel (Backend)
* **Multi-Role Authentication:**
    * **Admin:** Akses penuh (CRUD) ke seluruh data sistem (User, Dosen, Konten).
    * **Editor:** Manajemen data terbatas pada *resource* milik sendiri (Dosen terkait).
* **Manajemen Konten Terintegrasi:**
    * Pengelolaan Berita, Produk, Fasilitas, dan Publikasi.
    * **Auto-Sync Galeri:** Upload foto di modul lain otomatis tersinkronisasi ke modul Galeri.
* **Manajemen Akademik:**
    * Pencatatan Aktivitas Dosen, Riset, Pengabdian Masyarakat (PPM), dan Kekayaan Intelektual.
* **User Management:** Pengelolaan akun pengguna dengan hashing password aman (`bcrypt`).

## 📂 Struktur Repositori

Proyek ini mengadopsi arsitektur MVC kustom untuk memisahkan logika bisnis, data, dan tampilan.

```text
/root
├── app/                        # Inti Logika Aplikasi
│   ├── controllers/            # Pengendali Alur (Controller)
│   │   ├── admin/              # Controller Backend (Dashboard, CRUD)
│   │   │   ├── AuthController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── DosenController.php
│   │   │   └── ... (Controller fitur lainnya)
│   │   └── website/            # Controller Frontend (Public View)
│   │       ├── HomeController.php
│   │       ├── GalleryController.php
│   │       └── ...
│   │
│   ├── core/                   # Framework Core
│   │   ├── Controller.php      # Base Controller
│   │   ├── Middleware.php      # Auth & Role Protection
│   │   └── Model.php           # Base Model & DB Connection
│   │
│   ├── models/                 # Layer Data (Database Interaction)
│   │   ├── Dosen.php
│   │   ├── Berita.php
│   │   ├── Galeri.php
│   │   └── ...
│   │
│   ├── views/                  # Antarmuka Pengguna (HTML/PHP)
│   │   ├── admin/              # Template Admin Panel
│   │   └── public/             # Template Website Publik
│   │
│   └── helpers/                # Fungsi Bantuan (Upload, Format, dll)
│
├── config/                     # Konfigurasi Sistem
│   └── Database.php            # Koneksi PostgreSQL
│
├── database/                   # Aset Database
│   ├── database.sql            # Skema Database Utama
│   └── dump-Ai...sql           # Backup Data
│
└── public/                     # Document Root (Akses Publik)
    ├── css/                    # Stylesheet (Tailwind & Custom CSS)
    ├── script/                 # JavaScript (AOS, Logic UI)
    ├── uploads/                # Penyimpanan File Statis
    ├── .htaccess               # Routing Rules
    └── index.php               # Entry Point Aplikasi

```

## 🛠 Teknologi

Backend: PHP 8.x (Native)
Database: PostgreSQL 15+ (Support pgcrypto extension)
Frontend:
HTML5, CSS3
Tailwind CSS (via CDN)
JavaScript (jQuery, AOS Library)
Server: Apache / Nginx (dengan mod_rewrite)

## 🚀 Panduan Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek di lingkungan lokal:

1. Prasyarat

Pastikan komputer Anda telah terinstal:
PHP >= 8.0
PostgreSQL
Web Server (Apache/Nginx)

2. Konfigurasi Database

Buat database baru di PostgreSQL, misal: lab_ai_polinema.
Import skema database dari file app/database/database.sql atau database/dump-Ai...sql.
Pastikan ekstensi pgcrypto aktif di database tersebut.

3. Konfigurasi Aplikasi

Buka file app/config/Database.php.
Sesuaikan kredensial database Anda:
PHP
$host = 'localhost';
$dbname = 'lab_ai_polinema';
$user = 'postgres';
$pass = 'password_anda';



4. Setup Server

Arahkan Document Root web server Anda ke folder public/ dalam proyek ini.
Jika menggunakan Apache, pastikan modul mod_rewrite diaktifkan agar file .htaccess berfungsi untuk clean URL.

5. Akses Aplikasi

Akses Cepat: (namafolder).test
atau
Frontend: Buka http://localhost/ (atau domain lokal Anda).
Admin Panel: Buka http://localhost/admin/login.
Default Admin: Username: admin, Password: 123 (sesuai seed data).

## 🔒 Keamanan & Hak Akses

Sistem menggunakan Middleware untuk membatasi akses:
Middleware::auth(): Memastikan user sudah login.
Middleware::onlyAdmin(): Membatasi fitur kritis (seperti kelola User) hanya untuk role admin.
Middleware::onlyEditor(): Memastikan editor hanya bisa memanipulasi data miliknya sendiri.

## 🤝 Kontribusi

Kontribusi sangat diterima untuk pengembangan fitur baru atau perbaikan bug.
Fork repositori ini.
Buat branch fitur baru (git checkout -b fitur-keren).
Commit perubahan Anda (git commit -m 'Menambah fitur keren').
Push ke branch (git push origin fitur-keren).
Buat Pull Request.

## 📄 Lisensi

Proyek ini dikembangkan untuk keperluan internal Laboratorium Applied Informatics - Politeknik Negeri Malang.
© 2025 Lab Applied Informatics Polinema
