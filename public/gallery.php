<?php
require_once '../app/config/Koneksi.php'; 

function fetchAllGallery() {
    try {
        $sql = "SELECT id_gallery, title, description, image, uploaded_by, upload_date, category FROM gallery ORDER BY upload_date DESC";
        $res = q($sql); 
        $gallery = pg_fetch_all($res) ?: [];
        return $gallery;
    } catch (RuntimeException $e) {
        error_log("Gagal mengambil gallery: " . $e->getMessage());
        return [];
    }
}

$galleryItems = fetchAllGallery();

// Fallback gallery items if database is empty
if (empty($galleryItems)) {
    $galleryItems = [
        [
            'title' => 'AI Workshop 2024',
            'description' => 'Students learning machine learning fundamentals',
            'image' => 'img/Lab.png',
            'uploaded_by' => 'Dr. Ahmad Rizki',
            'upload_date' => '2024-11-20',
            'category' => 'Workshop'
        ],
        [
            'title' => 'Robotics Competition',
            'description' => 'Our team winning the regional robotics championship',
            'image' => 'img/ruangan.jpg',
            'uploaded_by' => 'Prof. Sarah Wijaya',
            'upload_date' => '2024-11-15',
            'category' => 'Competition'
        ],
        [
            'title' => 'Lab Facilities',
            'description' => 'State-of-the-art AI research laboratory',
            'image' => 'img/Lab.png',
            'uploaded_by' => 'Admin Lab AI',
            'upload_date' => '2024-11-10',
            'category' => 'Facilities'
        ],
        [
            'title' => 'Guest Lecture',
            'description' => 'Industry expert sharing insights on AI applications',
            'image' => 'img/ruangan.jpg',
            'uploaded_by' => 'Dr. Budi Santoso',
            'upload_date' => '2024-11-05',
            'category' => 'Event'
        ],
        [
            'title' => 'Project Presentation',
            'description' => 'Students presenting their capstone AI projects',
            'image' => 'img/Lab.png',
            'uploaded_by' => 'Dr. Lisa Pratiwi',
            'upload_date' => '2024-10-28',
            'category' => 'Academic'
        ],
        [
            'title' => 'Team Collaboration',
            'description' => 'Research team working on computer vision project',
            'image' => 'img/ruangan.jpg',
            'uploaded_by' => 'Prof. Andi Kurniawan',
            'upload_date' => '2024-10-20',
            'category' => 'Research'
        ]
    ];
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="style/Style.css">
    <script src="https://cdn.tailwindcss.com"></script>
     <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Gallery - Lab AI Polinema</title>
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
            animation: scroll-logos 80s linear infinite; /* Animasi utama */
        }

        /* Styling Setiap Carousel Card */
        .carousel-card {
            display: inline-block;
            margin: 0 0.75rem;
            width: 350px;
            vertical-align: top;
            white-space: normal;
        }
        
        .carousel-card-inner {
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .carousel-card-inner:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        
        .carousel-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }
        
        .carousel-card-content {
            padding: 1.25rem;
        }
        
        .carousel-card-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #1a202c;
            margin-bottom: 0.5rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .carousel-card-date {
            font-size: 0.875rem;
            color: #718096;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        /* Catatan: Kelas fade-left dan fade-right dihilangkan
           dan digantikan dengan Tailwind utility classes di HTML. */
    </style>
</head>
<body>
    <?php include '../app/views/components/header.php'; ?>

    <section class="gallery-hero">
        <!-- Floating Icons -->
        <i class="fas fa-camera floating-icon" style="font-size: 3rem;"></i>
        <i class="fas fa-images floating-icon" style="font-size: 2.5rem;"></i>
        <i class="fas fa-palette floating-icon" style="font-size: 3rem;"></i>
        <i class="fas fa-star floating-icon" style="font-size: 2.5rem;"></i>

        <div class="gallery-hero-content">
            <h1>Capturing Our Journey,</h1>
            <h1 class="hero-highlight">One Moment at a Time</h1>
            <p class="gallery-hero-description">
                Documenting the innovation, dedication, and achievements of Lab AI Polinema,
                preserving memorable moments to inspire forever
            </p>
        </div>
    </section>

    <!-- Gallery Carousel Section -->
    <div class="w-full flex justify-center items-center py-8 bg-transparent">
        <div class="w-full max-w-6xl px-4">
            <!-- Kontainer utama karosel -->
            <div class="logo-carousel-container" style="height: 360px;">
                
                <!-- Track Gallery yang Bergerak -->
                <div class="logo-carousel-track">
                    
                    <!-- Set Gallery ASLI -->
                    <?php foreach ($galleryItems as $item): ?>
                    <div class="carousel-card">
                        <div class="carousel-card-inner">
                            <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>">
                            <div class="carousel-card-content">
                                <h3 class="carousel-card-title"><?= htmlspecialchars($item['title']) ?></h3>
                                <div class="carousel-card-date">
                                    <i class="fas fa-calendar"></i>
                                    <span><?= date('M d, Y', strtotime($item['upload_date'])) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                    <!-- Set Gallery DUPLIKAT (untuk efek tak terbatas) -->
                    <?php foreach ($galleryItems as $item): ?>
                    <div class="carousel-card">
                        <div class="carousel-card-inner">
                            <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>">
                            <div class="carousel-card-content">
                                <h3 class="carousel-card-title"><?= htmlspecialchars($item['title']) ?></h3>
                                <div class="carousel-card-date">
                                    <i class="fas fa-calendar"></i>
                                    <span><?= date('M d, Y', strtotime($item['upload_date'])) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                </div>

                <!-- Overlay untuk efek fading di tepi (menggunakan Tailwind Gradients) -->
                <div class="absolute inset-0 pointer-events-none">
                    <!-- Fade Kiri: Gradasi dari warna latar belakang halaman ke transparan -->
                    <div class="absolute left-0 top-0 bottom-0 w-1/12 bg-gradient-to-r from-[#ffffff] to-transparent"></div>
                    <!-- Fade Kanan: Gradasi dari transparan ke warna latar belakang halaman -->
                    <div class="absolute right-0 top-0 bottom-0 w-1/12 bg-gradient-to-l from-[#ffffff] to-transparent"></div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="shadow-bar-top">
        <div class="half-circle-glow"></div>
    </div>

    <section class="gallery-section">
        <div class="container">
            <!-- Filter Buttons -->
            <div class="gallery-filters">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="Workshop">Workshop</button>
                <button class="filter-btn" data-filter="Competition">Competition</button>
                <button class="filter-btn" data-filter="Event">Event</button>
                <button class="filter-btn" data-filter="Research">Research</button>
                <button class="filter-btn" data-filter="Academic">Academic</button>
            </div>

            <!-- Masonry Gallery Grid -->
            <div class="gallery-masonry">
                <?php foreach ($galleryItems as $index => $item): ?>
                    <div class="gallery-item" data-category="<?= htmlspecialchars($item['category']) ?>">
                        <div class="gallery-card">
                            <div class="gallery-image-container">
                                <img src="<?= htmlspecialchars($item['image']) ?>" 
                                     alt="<?= htmlspecialchars($item['title']) ?>"
                                     loading="lazy">
                                <div class="gallery-overlay">
                                    <div class="gallery-overlay-content">
                                        <span class="gallery-category-badge">
                                            <?= htmlspecialchars($item['category']) ?>
                                        </span>
                                        <h3 class="gallery-item-title">
                                            <?= htmlspecialchars($item['title']) ?>
                                        </h3>
                                        <p class="gallery-item-description">
                                            <?= htmlspecialchars($item['description']) ?>
                                        </p>
                                        <div class="gallery-meta">
                                            <span class="gallery-uploader">
                                                <i class="fas fa-user"></i>
                                                <?= htmlspecialchars($item['uploaded_by']) ?>
                                            </span>
                                            <span class="gallery-date">
                                                <i class="fas fa-calendar"></i>
                                                <?= date('M d, Y', strtotime($item['upload_date'])) ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include '../app/views/components/footer.php'; ?>

    <script>
        // Filter functionality
        const filterBtns = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('active'));
                // Add active class to clicked button
                btn.classList.add('active');

                const filterValue = btn.getAttribute('data-filter');

                galleryItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'block';
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'scale(1)';
                        }, 10);
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.8)';
                        setTimeout(() => {
                            item.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });
    </script>
</body>
</html>
