<?php
// Memuat file koneksi database
require_once '../app/config/Koneksi.php'; 

// Fungsi untuk mengambil semua data proyek dari tabel 'projects'
function fetchProjects() {
    try {
       $sql = "SELECT id_produk, nama_produk, deskripsi, kategori, link_demo, image FROM produk ORDER BY id_produk DESC LIMIT 3";
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
        
        $sql = "SELECT nama_dosen, email, foto_profil, deskripsi, keahlian_text, no_telepon FROM dosen ORDER BY nama_dosen ASC";
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
    <?php include '../app/views/components/header.php'; ?>

    <section class="hero section ">
        <div class="container hero-grid">
            <div class="hero-left">
                <h1 class="hero-title">
                    Welcome to <br> 
                    <span class="gradient-text">Applied Informatics</span>
                </h1>
                <p class="hero-description">
                    The Applied Informatics Laboratory at Malang State Polytechnic is an innovation center focused on developing IT-based solutions.
                </p>
                <div class="hero-button">
                    <button class="button-primary">Explore Our Work</button>
                    <button class="button-secondary">Connect With Us</button>
                </div>
            </div>

            <div class="hero-right">
                <div class="hero-image-card">
                    <img src="img/image.png" alt="kosong">
                </div>
            </div>
        </div>-
    </section>
    <div class="shadow-bar-top">
<!-- Div untuk Glow Setengah Lingkaran -->
        <div class="half-circle-glow"></div>
    </div>
    <section class="scope section">
        <div class="container">
            <div class="scope-header">
                <div class="title">
                    <!-- Ikon Grup Orang (SVG Inline) -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm8 2c-2.33 0-6.99 1.4-6.99 3.5V17h7.01v-0.5c0-2.1-4.67-3.5-7.01-3.5zm-8 0c-2.33 0-4.67 1.4-4.67 3.5V17h4.67c0-2.1 2.34-3.5 4.67-3.5z"/>
                        </svg>
                            OUR CORE FOCUS
                </div>
                <p class="scope-title-main">Defining Our <span>Scope</span></p>
                <div class="scope-description-wrapper">
                    <p class="scope-description">
                        We are focused on helping brands grow through digital transformation services. We bring real solutions to each client’s <br>problems through a deep understanding of their market, solution, and vision.
                    </p>
                </div>
            </div>
            <div class="scopes-grid">
                <div class="scope-card">
                    <img src="" alt="">
                    <h3 class="scope-title">
                        Information System & Automation
                    </h3>
                    <div class="scopes-description">
                        Nisi, dis sed cursus eget pellentesque mattis. Odio eu proin aliquam a. Semper bibendum tellus non tellus, facilisi dignissim in quam massa. Aliquam, feugiat ut cum tellus, sit. Quis consectetur gravida ac ac lectus cursus egestas.
                    </div>
                </div>
                <div class="scope-card">
                    <img src="" alt="">
                    <h3 class="scope-title">
                        Internet Of Thinks & Applied Technologies
                    </h3>
                    <div class="scopes-description">
                        Nisi, dis sed cursus eget pellentesque mattis. Odio eu proin aliquam a. Semper bibendum tellus non tellus, facilisi dignissim in quam massa. Aliquam, feugiat ut cum tellus, sit. Quis consectetur gravida ac ac lectus cursus egestas.
                    </div>
                </div>
                <div class="scope-card">
                    <img src="" alt="">
                    <h3 class="scope-title">
                        Artificial Intelligence
                    </h3>
                    <div class="scopes-description">
                        Nisi, dis sed cursus eget pellentesque mattis. Odio eu proin aliquam a. Semper bibendum tellus non tellus, facilisi dignissim in quam massa. Aliquam, feugiat ut cum tellus, sit. Quis consectetur gravida ac ac lectus cursus egestas.
                    </div>
                </div>
                <div class="scope-card">
                    <img src="" alt="">
                    <h3 class="scope-title">
                        Research & Collaboration
                    </h3>
                    <div class="scopes-description">
                        Nisi, dis sed cursus eget pellentesque mattis. Odio eu proin aliquam a. Semper bibendum tellus non tellus, facilisi dignissim in quam massa. Aliquam, feugiat ut cum tellus, sit. Quis consectetur gravida ac ac lectus cursus egestas.
                    </div>
                </div>
                <div class="scope-card">
                    <img src="" alt="">
                    <h3 class="scope-title">
                        Application Development
                    </h3>
                    <div class="scopes-description">
                        Nisi, dis sed cursus eget pellentesque mattis. Odio eu proin aliquam a. Semper bibendum tellus non tellus, facilisi dignissim in quam massa. Aliquam, feugiat ut cum tellus, sit. Quis consectetur gravida ac ac lectus cursus egestas.
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
    <?php include '../app/views/components/product.php'; ?>
    <?php include '../app/views/components/team.php'; ?>
    <?php include '../app/views/components/footer.php'; ?>
</body>
</html>