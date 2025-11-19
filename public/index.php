<?php
// Memuat file koneksi database
require_once '../app/config/Koneksi.php'; 

// Fungsi untuk mengambil semua data proyek dari tabel 'projects'
function fetchProjects() {
    try {
        $sql = "SELECT judul, deskripsi, kategori, tahun, teknologi, url_demo, gambar_url FROM projects ORDER BY tahun DESC LIMIT 3";
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
    <?php include '../app/views/components/header.php'; ?>

    <section class="hero">
        <div class="container hero-grid">
            <div class="hero-left">
                <h1 class="hero-title">
                    Welcome to <br> 
                    <span class="gradient-text">Applied Informatics</span>
                </h1>
                <p class="hero-description">
                    The Applied Informatics Laboratory at Malang State Polytechnic is an innovation center focused on developing IT-based solutions. LIT strives to deliver relevant and useful technology through collaboration, while strengthening Polinema's position as a leading institution in applied informatics.
                </p>
                <div class="hero-button">
                    <button class="button-primary">Explore Our Work</button>
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
        </div>-
    </section>
    <section id="scope">
        <div class="container">
            <div class="scope-header">
                <h2 class="scope-title-main">Scope</h2>
                <div class="scope-description-wrapper">
                    <p class="scope-description">
                        We are focused on helping brands grow through digital transformation services. We bring real solutions to each client’s <br>problems through a deep understanding of their market, solution, and vision.
                    </p>
                    <button class="button-secondary">
                        <a href="#" class="scope-link-button">See all services</a>
                    </button>
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
    <?php include '../app/views/components/projects.php'; ?>
    <?php include '../app/views/components/team.php'; ?>
    <?php include '../app/views/components/footer.php'; ?>
</body>
</html>