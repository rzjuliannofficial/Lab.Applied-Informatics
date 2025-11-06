<?php
// Memuat file koneksi database
require_once 'connection/Koneksi.php'; 

// Fungsi untuk mengambil semua data proyek dari tabel 'projects'
function fetchProjects() {
    try {
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
    <link rel="stylesheet" href="style/Style.css">
</head>
<body>
    <?php include 'components/header.php'; ?>

    <section class="hero">
        <div class="container hero-grid">
            <div class="hero-left">
                <h1 class="hero-title">
                    Laboratorium <span class="gradient-text">AI & Multimedia</span>
                </h1>
                <p class="hero-description">
                    Kami adalah pusat inovasi yang menggabungkan teknologi AI terkini dengan kreativitas multimedia. 
                    Tempat di mana ide-ide cemerlang menjadi solusi nyata.
                </p>
                <div class="hero-button">
                    <button class="button-primary">Mulai Sekarang</button>
                    <button class="button-secondary">Pelajari Lebih Lanjut</button>
                </div>
            </div>

            <div class="hero-right">
                <div class="hero-image-card">
                    <div class="hero-image-content">
                        <svg class="hero-image-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="hero-image-text">Inovasi Teknologi Terkini</p>
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