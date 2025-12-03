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
            <?php if (empty($galleryItems)): ?>
                <!-- Empty State for Carousel -->
                <div class="text-center py-16">
                    <i class="fas fa-images text-gray-300 text-6xl mb-4"></i>
                    <p class="text-gray-500 text-lg">No gallery items yet. Upload images in Berita, Produk, or other modules to see them here.</p>
                </div>
            <?php else: ?>
            <!-- Kontainer utama karosel -->
            <div class="logo-carousel-container" style="height: 360px;">
                
                <!-- Track Gallery yang Bergerak -->
                <div class="logo-carousel-track">
                    
                    <!-- Set Gallery ASLI -->
                    <?php foreach ($galleryItems as $item): ?>
                    <div class="carousel-card">
                        <div class="carousel-card-inner">
                            <img src="<?= htmlspecialchars($item['file_url']) ?>" alt="<?= htmlspecialchars($item['caption']) ?>">
                            <div class="carousel-card-content">
                                <h3 class="carousel-card-title"><?= htmlspecialchars($item['caption']) ?></h3>
                                <div class="carousel-card-date">
                                    <i class="fas fa-calendar"></i>
                                    <span><?= date('M d, Y', strtotime($item['tanggal_upload'])) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                    <!-- Set Gallery DUPLIKAT (untuk efek tak terbatas) -->
                    <?php foreach ($galleryItems as $item): ?>
                    <div class="carousel-card">
                        <div class="carousel-card-inner">
                            <img src="<?= htmlspecialchars($item['file_url']) ?>" alt="<?= htmlspecialchars($item['caption']) ?>">
                            <div class="carousel-card-content">
                                <h3 class="carousel-card-title"><?= htmlspecialchars($item['caption']) ?></h3>
                                <div class="carousel-card-date">
                                    <i class="fas fa-calendar"></i>
                                    <span><?= date('M d, Y', strtotime($item['tanggal_upload'])) ?></span>
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
            <?php endif; ?>
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
                <button class="filter-btn" data-filter="Publikasi Dosen">Publikasi Dosen</button>
                <button class="filter-btn" data-filter="Berita">Berita</button>
                <button class="filter-btn" data-filter="Produk">Produk</button>
                <button class="filter-btn" data-filter="Fasilitas">Fasilitas</button>
                <button class="filter-btn" data-filter="Aktivitas Dosen">Aktivitas Dosen</button>
                <button class="filter-btn" data-filter="PPM">PPM</button>
                <button class="filter-btn" data-filter="Kekayaan Intelektual">HKI</button>
            </div>

            <!-- Masonry Gallery Grid -->
            <div class="gallery-masonry">
                <?php if (empty($galleryItems)): ?>
                    <!-- Empty State for Gallery Grid -->
                    <div class="col-span-full text-center py-20">
                        <i class="fas fa-folder-open text-gray-300 text-7xl mb-6"></i>
                        <h3 class="text-2xl font-bold text-gray-700 mb-3">Gallery is Empty</h3>
                        <p class="text-gray-500 text-lg mb-6">Start by creating content with images in the admin panel.</p>
                        <p class="text-gray-400">Images from Berita, Produk, Fasilitas, and other modules will automatically appear here.</p>
                    </div>
                <?php else: ?>
                <?php foreach ($galleryItems as $index => $item): ?>
                    <div class="gallery-item" data-category="<?= htmlspecialchars($item['category']) ?>">
                        <div class="gallery-card">
                            <div class="gallery-image-container">
                                <img src="<?= htmlspecialchars($item['file_url']) ?>" 
                                     alt="<?= htmlspecialchars($item['caption']) ?>"
                                     loading="lazy">
                                <div class="gallery-overlay">
                                    <div class="gallery-overlay-content">
                                        <span class="gallery-category-badge">
                                            <?= htmlspecialchars($item['category']) ?>
                                        </span>
                                        <h3 class="gallery-item-title">
                                            <?= htmlspecialchars($item['judul'] ?? $item['caption']) ?>
                                        </h3>
                                        <p class="gallery-item-description">
                                            <?= htmlspecialchars($item['caption'] ?? 'Dokumentasi Lab AI') ?>
                                        </p>
                                        <div class="gallery-meta">
                                            <span class="gallery-uploader">
                                                <i class="fas fa-user"></i>
                                                <?= htmlspecialchars($item['uploaded_by'] ?? 'Admin') ?>
                                            </span>
                                            <span class="gallery-date">
                                                <i class="fas fa-calendar"></i>
                                                <?= date('M d, Y', strtotime($item['tanggal_upload'])) ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <script>
    // Gallery Filter Functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');
        
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Get filter value
                const filterValue = this.getAttribute('data-filter');
                
                // Filter gallery items
                galleryItems.forEach(item => {
                    const itemCategory = item.getAttribute('data-category');
                    
                    if (filterValue === 'all' || itemCategory === filterValue) {
                        item.style.display = 'block';
                        item.style.animation = 'fadeIn 0.5s ease-in';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
    </script>
    
    <style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>