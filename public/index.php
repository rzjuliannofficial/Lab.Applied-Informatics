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

    <section class="hero section">
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
    <section class="scope section">
        <div class="container">
            <div class="scope-header">
                <div class="buletan">
                    <button>OUR CORE FOCUS</button>
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