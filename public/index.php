<?php
<<<<<<< HEAD
// Memuat file koneksi database
require_once '../app/config/Koneksi.php'; 
include '../app/model/products.php';
=======
session_start();
>>>>>>> f8f5c56959e3d303a14ba42cc5007a9080e00364

// =========================
// AUTOLOAD
// =========================
spl_autoload_register(function ($class) {

    $paths = [
        "../app/core/$class.php",
        "../app/models/$class.php",
        "../app/controllers/$class.php",
        "../app/controllers/admin/$class.php",
        "../app/controllers/website/$class.php",
        "../config/$class.php"
    ];

<<<<<<< HEAD
// Ambil data sebelum memuat komponen
$team = fetchTeam();
$products = fetchProducts();

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab AI Polinema - Inovasi Multimedia Terdepan</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/Style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
    <?php include '../app/views/components/scope.php'; ?>
    <?php include '../app/views/components/news.php'; ?>
    <?php foreach ($products as $product): ?>
        <?php include('../app/views/components/product.php') ?>
    <?php endforeach; ?>
    <?php include '../app/views/components/member.php'; ?>
    <?php include '../app/views/components/fasilities.php'; ?>
    <?php include '../app/views/components/publication.php'; ?>
    <?php include '../app/views/components/footer.php'; ?>
    <div class="bottom-blur-overlay"></div>
</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
//   AOS.init();
  AOS.init({
    once: false,
    duration: 1500, // Durasi animasi 1 detik
    easing: 'ease-out',
    offset: 0,    // Jarak trigger dari bawah layar
  });
</script>
<script>
    // Dapatkan elemen yang dibutuhkan
const bottomBlur = document.querySelector('.bottom-blur-overlay');
const footer = document.querySelector('.target-hidden'); // Asumsi elemen footer Anda menggunakan tag <footer>
const blurHeight = bottomBlur ? bottomBlur.offsetHeight : 0; // Tinggi blur (2rem)

if (bottomBlur && footer) {
    
    // Fungsi untuk memeriksa posisi
    function checkVisibility() {
        // Mendapatkan posisi footer relatif terhadap viewport
        const footerRect = footer.getBoundingClientRect();

        // Kondisi: Apakah bagian atas footer (footerRect.top)
        // sudah berada di atas posisi "bottom of the viewport MINUS tinggi blur"?
        // Jika footer sudah "naik" melewati batas blur, sembunyikan blur.
        if (footerRect.top <= (window.innerHeight - blurHeight)) {
            // Sembunyikan blur saat footer mulai menyentuh area blur
            bottomBlur.classList.add('is-hidden');
        } else {
            // Tampilkan kembali blur saat footer sudah jauh di bawah
            bottomBlur.classList.remove('is-hidden');
=======
    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
>>>>>>> f8f5c56959e3d303a14ba42cc5007a9080e00364
        }
    }
});

// ====================================================
//  BYPASS UNTUK FILE STATIS DI /public/uploads/
// ====================================================
$requestUri = $_SERVER['REQUEST_URI'];

if (preg_match('#^/uploads/#', $requestUri)) {
    $filePath = __DIR__ . $requestUri;

    if (file_exists($filePath)) {
        $mime = mime_content_type($filePath);
        header("Content-Type: $mime");
        readfile($filePath);
        exit;
    }

    http_response_code(404);
    echo "File tidak ditemukan";
    exit;
}

// =========================
// BACA URL
// =========================
$url = isset($_GET['url']) ? trim($_GET['url'], '/') : 'home'; //default to home
$segments = explode('/', $url);


// ===================================================================================
//                                    ROUTER ADMIN
// ===================================================================================
if ($segments[0] === "admin") {

    // ---- 1. ROUTE: /admin/dashboard ----
    if (($segments[1] ?? '') === 'dashboard') {

        $controllerName = "DashboardController";
        $method = "index";
        $param = $segments[2] ?? null;

        $controllerPath = "../app/controllers/admin/{$controllerName}.php";
        require_once $controllerPath;

        $controller = new $controllerName();
        $param ? $controller->$method($param) : $controller->$method();

        exit;
    }

    // ---- 2. ROUTING AUTH ----
    $authMethods = ['login', 'doLogin', 'register', 'doRegister', 'logout'];

    if (in_array($segments[1] ?? '', $authMethods)) {

        $controllerName = "AuthController";
        $method = $segments[1] ?? "login";
        $param = $segments[2] ?? null;

        $controllerPath = "../app/controllers/admin/{$controllerName}.php";

        if (!file_exists($controllerPath)) {
            die("Controller {$controllerName} tidak ditemukan:<br>{$controllerPath}");
        }

        require_once $controllerPath;
        $controller = new $controllerName();

        if (!method_exists($controller, $method)) {
            die("Method {$method} tidak ditemukan di {$controllerName}");
        }

        $param ? $controller->$method($param) : $controller->$method();

        exit;
    }

    // ---- 3. ADMIN LAIN (ex: dosen, publikasi, gallery) ----
    $controllerName = ucfirst($segments[1] ?? 'dashboard') . "Controller";
    $method = $segments[2] ?? "index";
    $param = $segments[3] ?? null;

    $controllerPath = "../app/controllers/admin/{$controllerName}.php";

    if (!file_exists($controllerPath)) {
        die("Controller {$controllerName} tidak ditemukan:<br>{$controllerPath}");
    }

    require_once $controllerPath;

    if (!class_exists($controllerName)) {
        die("Class {$controllerName} tidak ditemukan!");
    }

    $controller = new $controllerName();

    if (!method_exists($controller, $method)) {
        die("Method {$method} tidak ditemukan di {$controllerName}!");
    }

    $param ? $controller->$method($param) : $controller->$method();

    exit;
}





// ===================================================================================
//                            ROUTING WEBSITE DEFAULT
// ===================================================================================

$controllerName = ucfirst($segments[0]) . "Controller";
$method = $segments[1] ?? "index";
$param = $segments[2] ?? null;

$controllerPath = "../app/controllers/website/{$controllerName}.php";

if (!file_exists($controllerPath)) {
    die("Controller {$controllerName} tidak ditemukan:<br>{$controllerPath}");
}

require_once $controllerPath;

if (!class_exists($controllerName)) {
    die("Class {$controllerName} tidak ditemukan!");
}

$controller = new $controllerName();

if (!method_exists($controller, $method)) {
    die("Method {$method} tidak ditemukan di {$controllerName}!");
}

$param ? $controller->$method($param) : $controller->$method();

