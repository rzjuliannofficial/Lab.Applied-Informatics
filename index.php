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
    <?php include 'components/hero.php'; ?>
    <?php include 'components/projects.php'; ?>
    <?php include 'components/team.php'; ?>
    <?php include 'components/footer.php'; ?>
</body>
</html>