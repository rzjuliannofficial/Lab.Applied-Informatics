<?php
// Memuat file koneksi database
require_once '../app/config/Koneksi.php'; 

// Fungsi untuk mengambil semua data proyek dari tabel 'projects'
function fetchProjects() {
    try {
       $sql = "SELECT id_produk, nama_produk, deskripsi, kategori, link_demo, image FROM produk ORDER BY id_produk DESC LIMIT 4";
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
        
        $sql = "SELECT nama_dosen, email, foto_profil, deskripsi, keahlian_text, no_telepon FROM dosen ORDER BY nama_dosen ASC limit 2";
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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
        /* PENTING: Animasi `@keyframes` harus tetap menggunakan CSS murni.
           Tailwind tidak memiliki utility class bawaan untuk @keyframes. */
        @keyframes scroll-logos {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%); /* Menggulir separuh lebar track untuk looping */
            }
        }

        /* Kelas untuk kontainer karosel */
        .logo-carousel-container {
            width: 100%;
            background-color: transparent;
            overflow: hidden; /* Menyembunyikan bagian yang sedang bergerak */
            white-space: nowrap;
            border-radius: 12px;
            padding: 0; /* Padding disesuaikan */
            position: relative;
        }

        /* Wrapper tempat semua logo (asli + duplikat) berada */
        .logo-carousel-track {
            display: inline-block;
            width: 200%; /* Penting: Harus dua kali lebar konten untuk looping mulus */
            animation: scroll-logos 30s linear infinite; /* Animasi utama */
        }

        /* Styling Setiap Logo */
        .logo-item {
            display: inline-block;
            margin: 0; /* Jarak antar logo DIHILANGKAN */
            height: 50px; 
            line-height: 50px; /* Vertikal center */
            text-align: center;
        }
        
        .logo-item img {
            max-height: 100%;
            max-width: 120px; 
            width: auto;
            height: auto;
            object-fit: contain;
            padding-right: 1rem;
            /* Filter untuk membuat logo terlihat putih/abu-abu */
            /* filter: grayscale(100%) brightness(1.8);    
            opacity: 0.6; */
            transition: opacity 0.3s;
        }
        
        /* Catatan: Kelas fade-left dan fade-right dihilangkan
           dan digantikan dengan Tailwind utility classes di HTML. */
    </style>
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
                
               <div class="w-full max-w-lg mt-8 justify-center items-center p-4">               
                    <div class="w-full max-w-md"> <!-- Lebar Maksimum tetap max-w-md --> 
                        <!-- Kontainer utama karosel -->
                        <div class="logo-carousel-container h-20 sm:h-11">
                            
                            <!-- Track Logam yang Bergerak -->
                            <div class="logo-carousel-track">
                                
                                <!-- Set Logo ASLI (6 item) -->
                                <div class="logo-item"><img src="img/OwnCloud2-Logo.svg_-300x157.png" alt="OwnCloud Logo"></div>
                                <div class="logo-item"><img src="img/seals.png" alt="SEALS Logo"></div>
                                <div class="logo-item"><img src="img/amati.png" alt="Amati Logo"></div>
                                <div class="logo-item"><img src="img/gitea-300x107-removebg-preview.png" alt="Gitea Logo"></div>
                                <div class="logo-item"><img src="img/logo_blockchain-1024x305.png" alt="CrowdEquiChain Logo"></div>
                                <div class="logo-item"><img src="img/ijo-removebg-preview.png" alt="Ijo Logo"></div>
                                
                                <!-- Set Logo DUPLIKAT (untuk efek tak terbatas) -->
                                <div class="logo-item"><img src="img/OwnCloud2-Logo.svg_-300x157.png" alt="OwnCloud Logo"></div>
                                <div class="logo-item"><img src="img/seals.png" alt="SEALS Logo"></div>
                                <div class="logo-item"><img src="img/amati.png" alt="Amati Logo"></div>
                                <div class="logo-item"><img src="img/gitea-300x107-removebg-preview.png" alt="Gitea Logo"></div>
                                <div class="logo-item"><img src="img/logo_blockchain-1024x305.png" alt="CrowdEquiChain Logo"></div>
                                <div class="logo-item"><img src="img/ijo-removebg-preview.png" alt="Ijo Logo"></div>
                                
                            </div>

                            <!-- Overlay untuk efek fading di tepi (menggunakan Tailwind Gradients) -->
                        <!-- Overlay untuk efek fading di tepi (menggunakan Tailwind Gradients) -->
                            <div class="absolute inset-0 pointer-events-none">
                                <!-- Fade Kiri: Gradasi dari warna latar belakang halaman (bg-gray-900) ke transparan -->
                                <div class="absolute left-0 top-0 bottom-0 w-1/12 bg-gradient-to-r from-[#ffffff] to-transparent"></div>
                                <!-- Fade Kanan: Gradasi dari transparan ke warna latar belakang halaman (bg-gray-900) -->
                                <div class="absolute right-0 top-0 bottom-0 w-1/12 bg-gradient-to-l from-[#ffffff] to-transparent"></div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="hero-right">
                <div class="hero-image-card">
                    <img src="img/Lab.png" alt="kosong">
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
                <p class="secondary-title">Defining Our <span>Scope</span></p>
                <p class="scope-description">
                    We are focused on helping brands grow through digital transformation services. We bring real solutions to each client’s <br>problems through a deep understanding of their market, solution, and vision.
                </p>
            </div>
            <div class="scopes-grid">
                <div class="scope-card">
                    <div class="icon fas fa-laptop-house"></div>
                    <h3 class="scope-title">
                        Information System & Automation <div class="fas fa-arrow-circle-right"></div>
                    </h3>
                    
                    <div class="scopes-description">
                        Nisi, dis sed cursus eget pellentesque mattis. Odio eu proin aliquam a. Semper bibendum tellus non tellus, facilisi dignissim in quam massa. Aliquam, feugiat ut cum tellus, sit. Quis consectetur gravida ac ac lectus cursus egestas.
                    </div>
                </div>
               
                <div class="scope-card">
                    <div class="icon fas fa-laptop-house"></div>
                    <h3 class="scope-title">
                        Internet Of Thinks & Applied Technologies <div class="fas fa-arrow-circle-right"></div>
                    </h3>
                    <div class="scopes-description">
                        Nisi, dis sed cursus eget pellentesque mattis. Odio eu proin aliquam a. Semper bibendum tellus non tellus, facilisi dignissim in quam massa. Aliquam, feugiat ut cum tellus, sit. Quis consectetur gravida ac ac lectus cursus egestas.
                    </div>
                </div>
                <div class="scope-card">
                    <div class="icon fas fa-laptop-house"></div>
                    <h3 class="scope-title">
                        Artificial Intelligence <div class="fas fa-arrow-circle-right"></div>
                    </h3>
                    <div class="scopes-description">
                        Nisi, dis sed cursus eget pellentesque mattis. Odio eu proin aliquam a. Semper bibendum tellus non tellus, facilisi dignissim in quam massa. Aliquam, feugiat ut cum tellus, sit. Quis consectetur gravida ac ac lectus cursus egestas.
                    </div>
                </div>
                <div class="scope-card">
                    <div class="icon fas fa-laptop-house"></div>
                    <h3 class="scope-title">
                        Research & Collaboration <div class="fas fa-arrow-circle-right"></div>
                    </h3>
                    <div class="scopes-description">
                        Nisi, dis sed cursus eget pellentesque mattis. Odio eu proin aliquam a. Semper bibendum tellus non tellus, facilisi dignissim in quam massa. Aliquam, feugiat ut cum tellus, sit. Quis consectetur gravida ac ac lectus cursus egestas.
                    </div>
                </div>
                <div class="scope-card">
                    <div class="icon fas fa-laptop-house"></div>
                    <h3 class="scope-title">
                        Application Development <div class="fas fa-arrow-circle-right"></div>
                    </h3>
                    <div class="scopes-description">
                        Nisi, dis sed cursus eget pellentesque mattis. Odio eu proin aliquam a. Semper bibendum tellus non tellus, facilisi dignissim in quam massa. Aliquam, feugiat ut cum tellus, sit. Quis consectetur gravida ac ac lectus cursus egestas.
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
    <?php include '../app/views/components/news.php'; ?>
    <?php include '../app/views/components/product.php'; ?>
    <?php include '../app/views/components/team.php'; ?>
    <?php include '../app/views/components/fasilities.php'; ?>
    <?php include '../app/views/components/publication.php'; ?>
    <?php include '../app/views/components/footer.php'; ?>
</body>
</html>