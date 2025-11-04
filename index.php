<?php
// Memuat file koneksi database
require_once 'Koneksi.php'; 

// Fungsi untuk mengambil semua data proyek dari tabel 'projects'
function fetchProjects() {
    try {
        // Menggunakan nama tabel 'projects' dan kolom yang tersedia
        $sql = "SELECT judul, deskripsi, kategori, tahun, teknologi, url_demo, gambar_url FROM projects ORDER BY tahun DESC LIMIT 6";
        $res = q($sql); 
        $projects = pg_fetch_all($res) ?: [];
        return $projects;
    } catch (RuntimeException $e) {
        error_log("Gagal mengambil proyek: " . $e->getMessage());
        return [];
    }
}

// Fungsi untuk mengambil semua data tim dari tabel 'dosen'
function fetchTeam() {
    try {
        // Menggunakan nama tabel 'dosen' dan kolom yang tersedia
        $sql = "SELECT nama, keahlian, email, no_telpon, foto_url, deskripsi FROM dosen ORDER BY nama ASC"; 
        $res = q($sql);
        $team = pg_fetch_all($res) ?: [];
        return $team;
    } catch (RuntimeException $e) {
        error_log("Gagal mengambil tim: " . $e->getMessage());
        return [];
    }
}

// Ambil data sebelum memuat komponen
$projects = fetchProjects();
$team = fetchTeam();

?><!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab AI Polinema - Inovasi Multimedia Terdepan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style/Style.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-color': 'var(--primary)',
                        'secondary-color': 'var(--secondary)',
                        'bg-dark-custom': 'var(--bg-dark)',
                        'bg-light-custom': 'var(--bg-light)',
                        'text-light-custom': 'var(--text-light)',
                        'border-custom': 'var(--border-color)',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-bg-light-custom text-white">
    <?php include 'components/header.php'; ?>

    <section class="relative overflow-hidden bg-bg-light-custom">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6 text-white">
                    Laboratorium <span class="gradient-text">AI & Multimedia</span>
                </h1>
                <p class="text-lg text-text-light-custom mb-8 leading-relaxed">
                    Kami adalah pusat inovasi yang menggabungkan teknologi AI terkini dengan kreativitas multimedia. 
                    Tempat di mana ide-ide cemerlang menjadi solusi nyata.
                </p>
                <div class="flex gap-4 flex-wrap">
                    <button class="button-primary">Mulai Sekarang</button>
                    <button class="button-secondary">Pelajari Lebih Lanjut</button>
                </div>
            </div>

            <div class="relative">
                <div class="w-full h-96 border border-border-custom rounded-2xl flex items-center justify-center bg-bg-dark-custom shadow-2xl shadow-secondary-color/20">
                    <div class="text-center p-8">
                        <svg class="w-20 h-20 mx-auto text-secondary-color" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="mt-4 font-semibold text-primary-color text-xl">Inovasi Teknologi Terkini</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php include 'components/projects.php'; ?>
    <?php include 'components/team.php'; ?>
    <?php include 'components/footer.php'; ?>
</body>
</html>