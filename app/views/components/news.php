<?php
function fetchNews() {
    try {
        $sql = "SELECT 
                    b.id, 
                    b.judul, 
                    b.isi_berita, 
                    b.tanggal, 
                    b.image, 
                    b.kategori,
                    u.nama AS nama_pembuat  -- Mengambil kolom nama dari tabel users
                FROM 
                    public.berita b
                JOIN 
                    public.users u ON b.created_by = u.id ORDER BY b.judul Asc";
        $res = q($sql);
        $news = pg_fetch_all($res) ?: [];
        return $news;
    } catch (RuntimeException $e) {
        error_log("Gagal mengambil tim: " . $e->getMessage());
        return [];
    }
}

if (empty($news)) {
$news = [
    // Item 1: Big Data (Cocok dengan Sonia - Ahli Big Data)
    [
        'created_by'   => 'a6f983b5-6a07-9928-d367-5a4b7968879a', // Sonia Dewi
        'judul'        => 'AI Talk Series: Introduction to Big Data Analytics',
        'kategori'     => 'Big Data , Ayam Koelng',
        'isi_berita'   => 'Lab AI Center of Excellence kembali menggelar acara AI Talk Series dengan tema "Introduction of Big Data Analytics". Membahas fundamental pengolahan data skala besar untuk pemula.',
        'tanggal'      => '2025-11-20',
        'image' => '../public/img/berita.png'
    ],

    // Item 2: Security & WFH (Cocok dengan Joni - Network Security)
    [
        'created_by'   => 'c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f', // Ir. Joni
        'judul'        => 'Tantangan Keamanan Siber di Era Remote Working',
        'kategori'     => 'Security',
        'isi_berita'   => 'Bagaimana perusahaan harus beradaptasi dengan ancaman keamanan siber yang meningkat saat karyawan bekerja dari rumah (WFH). Tips mengamankan jaringan VPN dan data sensitif.',
        'tanggal'      => '2025-11-18',
        'image' => '../public/img/berita.png'
    ],

    // Item 3: E-commerce (Cocok dengan Kevin - Database & System)
    [
        'created_by'   => 'd3c6e082-377d-6f9e-a03c-27184f3e5d67', // Dr. Kevin
        'judul'        => 'Laporan Tren E-commerce Kuartal Terbaru',
        'kategori'     => 'Bisnis',
        'isi_berita'   => 'Analisis mendalam tentang pertumbuhan dan pergeseran perilaku konsumen di pasar digital Indonesia berdasarkan data transaksi kuartal terakhir.',
        'tanggal'      => '2025-11-15',
        'image' => '../public/img/berita.png'
    ],

    // Item 4: Green Tech (Cocok dengan Naufal - Inovasi/Software)
    [
        'created_by'   => 'f5e872a4-599f-8817-c25e-493a68577f89', // Naufal Rizky
        'judul'        => 'Inovasi Teknologi Hijau di Indonesia',
        'kategori'     => 'Environment',
        'isi_berita'   => 'Melihat perkembangan startup yang berfokus pada solusi ramah lingkungan menggunakan teknologi terbaru untuk mengurangi jejak karbon industri.',
        'tanggal'      => '2025-11-12',
        'image' => '../public/img/berita.png'
    ],

    // Item 5: Semikonduktor (Cocok dengan Joni - Hardware/IoT)
    [
        'created_by'   => 'c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f', // Ir. Joni
        'judul'        => 'Krisis Semikonduktor Global: Dampak dan Solusi',
        'kategori'     => 'Supply Chain',
        'isi_berita'   => 'Meninjau bagaimana kekurangan chip global mempengaruhi manufaktur elektronik dan otomotif di seluruh dunia serta strategi mitigasinya.',
        'tanggal'      => '2025-11-10',
        'image' => '../public/img/berita.png'
    ],

    // Item 6: AI Generatif (Cocok dengan Rina - Deep Learning/NLP)
    [
        'created_by'   => 'b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e', // Dr. Rina
        'judul'        => 'Proyek Ambisius AI Generatif Mengguncang Industri Kreatif',
        'kategori'     => 'AI Generatif',
        'isi_berita'   => 'Peran kecerdasan buatan dalam menciptakan konten visual dan tekstual, serta tantangan etika yang menyertainya dalam dunia seni dan desain.',
        'tanggal'      => '2025-11-08',
        'image' => '../public/img/berita.png'
    ],

    // Item 7: Mobil Otonom (Cocok dengan Mira - Robotika/Computer Vision)
    [
        'created_by'   => 'e4d7f193-488e-770f-b14d-3829574f6e78', // Prof. Mira
        'judul'        => 'Masa Depan Transportasi: Uji Coba Mobil Otonom',
        'kategori'     => 'Otomotif',
        'isi_berita'   => 'Laporan terbaru mengenai keberhasilan uji coba kendaraan tanpa pengemudi di beberapa kota metropolitan Asia menggunakan sensor LiDAR canggih.',
        'tanggal'      => '2025-11-05',
        'image' => '../public/img/berita.png'
    ]
];
}
?>
<head>
    <style>

        /* Gaya Header Kustom (Bootstrap Style Conversion) */
        .header-font {
            font-family: poppins;
            font-size: 3rem;
            font-weight: 700;
            color: #1f2937;
            text-align: center;
        }
        .press-style {
            font-family: 'Times New Roman', serif;
            font-style: italic;
            font-size: 1em; 
        }

        /* --- Kustom 3D Carousel Styling (Dipertahankan dari versi sebelumnya) --- */
        .carousel-wrapper-3d {
            position: relative;
            height: 550px;
            perspective: 1000px;
            /* overflow: hidden; */
            margin-top: 5rem;
        }
        
        .carousel-item-3d {
            position: absolute;
            top: 0;
            left: 50%;
            width: 350px;
            transition: transform 0.6s ease, opacity 0.6s ease, z-index 0s 0.3s;
            transform-origin: center center;
            box-sizing: border-box;
            opacity: 0;
            pointer-events: none;
            cursor: pointer;
        }

        /* Gaya Kotak Gambar (Merah) */
        .image-placeholder {
            height: 180px;
            background-color: #a33e38; 
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }

        /* KELAS STATUS ITEM (Kunci Efek 3D) */

        .carousel-item-3d.active {
            opacity: 1;
            z-index: 10;
            transform: translateX(-50%) scale(1.1); 
            pointer-events: auto;
            filter: blur(0px); 
        }

        .carousel-item-3d.next {
            opacity: 0.7;
            z-index: 9;
            transform: translateX(10%) scale(0.9); 
            pointer-events: auto;
            filter: blur(1px);
        }

        .carousel-item-3d.prev {
            opacity: 0.7;
            z-index: 9;
            transform: translateX(-110%) scale(0.9); 
            pointer-events: auto;
            filter: blur(1px);
        }
        
        .carousel-item-3d.hidden {
            opacity: 0;
            z-index: 1;
            transform: translateX(150%) scale(0.8);
            transition: transform 0.6s ease, opacity 0.6s ease, z-index 0s 0.6s; 
            filter: blur(2px);
        }

        /* Gaya Tombol Navigasi */
        .nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 20; 
            cursor: pointer;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.4); 
            color: white;
            border-radius: 9999px; /* Tailwind rounded-full */
            transition: background-color 0.2s;
            border: none;
            outline: none;
        }
        .nav-btn:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }
        
        /* Penempatan Tombol */
        .btn-prev-custom { left: 0; } 
        .btn-next-custom { right: 0; }
        
        /* Responsif */
        @media (max-width: 768px) {
            .carousel-wrapper-3d {
                height: 450px; 
            }
            .carousel-item-3d {
                width: 90%; 
            }
            .carousel-item-3d.next {
                transform: translateX(5%) scale(0.9); 
            }
            .carousel-item-3d.prev {
                transform: translateX(-95%) scale(0.9); 
            }
            .btn-prev-custom { left: 2%; } 
            .btn-next-custom { right: 2%; }
            .nav-btn {
                width: 40px;
                height: 40px;
            }
        }

        /* Kustom Hover Scale untuk tombol Read More */
        .hover-scale:hover {
            transform: scale(1.05);
            transition: transform 0.2s ease-in-out;
        }
    </style>
</head>
<div class="shadow-bar-top">
<!-- Div untuk Glow Setengah Lingkaran -->
        <div class="half-circle-glow"></div>
    </div>
<section class="bg-[#f0f4f8] section">

    <div class="max-w-4xl mx-auto pt-[2rem] pb-[2rem]">
        <div class="project header">
            <div class="title">
            <!-- Ikon Grup Orang (SVG Inline) -->
                <i class="fa-solid fa-newspaper text-sm mr-2"></i> LATEST NEWS
            </div>
            <p class="secondary-title">Hot Off the <span>Press</span></p>
            <p class="text-center text-gray-500 mb-12">The most recent updates, all in one place.</p>
        </div>

        <!-- Carousel Container (Pusat Logika Cover Flow) -->
        <div class="carousel-wrapper-3d">
            <?php if (count($news) > 0): ?>
                <?php 
                    $delay_increment = 200; // Penambahan delay 200 milidetik per kartu
                    $delay = 0;
                ?>

                <?php foreach ($news as $berita): ?>
                    <!-- Card News -->
                    <div class="carousel-item-3d bg-white shadow-xl rounded-xl p-4">
                        <div class="h-48 w-full bg-gray-200 rounded-lg overflow-hidden relative mb-4">
                            <?php if (!empty($berita['image'])): ?>
                                <img src="<?= htmlspecialchars($berita['image']); ?>" 
                                    alt="<?= htmlspecialchars($berita['judul']); ?>" 
                                    class="w-full h-full object-cover">
                            <?php else: ?>
                                <div class="w-full h-full bg-[#a33e38] flex items-center justify-center text-white">
                                    <i class="fa-solid fa-image text-3xl opacity-50"></i>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- title -->
                        <h3 class="text-xl font-bold mb-2 text-gray-800">
                            <?= htmlspecialchars($berita['judul']); ?>
                        </h3>
                        <!-- kategori -->
                        <div class="flex flex-wrap text-xs mb-3 flex gap-2">
                            <?php 
                                $kategori = $berita['kategori'] ?? '';
                                if (!empty($kategori)) {
                                    $categories = explode(',', $kategori);
                                    // Tampilkan maksimal 3 category agar kartu tidak kepanjangan
                                    $categories = array_slice($categories, 0, 3); 
                                    foreach ($categories as $category): ?>
                                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full font-semibold uppercase">
                                            <?= htmlspecialchars(trim($category)); ?>
                                        </span>
                                <?php endforeach; } else { ?>
                                    <span class="text-gray-400 text-xs italic">-</span>
                            <?php } ?>

                            <!-- <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full">Tech Series</span>
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full">Big Data</span> -->
                        </div>
                        <!-- deskripsi -->
                        <p class="text-sm text-gray-500">
                            <?= htmlspecialchars($berita['isi_berita']); ?>
                        </p>
                        <?php 
                            //Tambah delay untuk kartu berikutnya
                            $delay += $delay_increment; 
                        ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="product-description" style="text-align: center; grid-column: 1 / -1;">Belum ada data produk yang tersedia.</p>
            <?php endif; ?> 

            <!-- Navigasi Tombol Panah -->
            <button class="nav-btn btn-prev-custom" id="btnPrev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="nav-btn btn-next-custom" id="btnNext">
                <i class="fas fa-chevron-right"></i>
            </button>
            
        </div>
        <div class="flex justify-center">
            <button class="button-primary">
                Read more
            </button>
        </div>

        <!-- Tombol "Read More" -->

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function() {
            const $items = $('.carousel-item-3d');
            const $btnNext = $('#btnNext');
            const $btnPrev = $('#btnPrev');
            const totalItems = $items.length;
            let currentIndex = 0;
            const autoSlideInterval = 5000;

            function updateCarousel() {
                $items.removeClass('active prev next hidden');
                
                $items.each(function(index) {
                    const $item = $(this);
                    let relativePosition = index - currentIndex;

                    if (relativePosition < 0) {
                        relativePosition += totalItems;
                    }
                    
                    if (relativePosition === 0) {
                        $item.addClass('active');
                    } else if (relativePosition === 1) {
                        $item.addClass('next');
                    } else if (relativePosition === totalItems - 1) {
                        $item.addClass('prev');
                    } else {
                        $item.addClass('hidden');
                    }
                });
            }
            
            function goToSlide(direction) {
                if (direction === 'next') {
                    currentIndex = (currentIndex + 1) % totalItems;
                } else {
                    currentIndex = (currentIndex - 1 + totalItems) % totalItems;
                }
                updateCarousel();
            }

            $btnNext.on('click', function() {
                goToSlide('next');
            });
            $btnPrev.on('click', function() {
                goToSlide('prev');
            });
            
            $items.on('click', function() {
                const $clickedItem = $(this);
                const itemIndex = parseInt($clickedItem.data('index'));
                
                if (itemIndex !== currentIndex) {
                    const nextIndex = (currentIndex + 1) % totalItems;
                    
                    if (itemIndex === nextIndex) {
                        goToSlide('next');
                    } else {
                        goToSlide('prev');
                    }
                }
            });

            updateCarousel();

            setInterval(() => {
                goToSlide('next');
            }, autoSlideInterval);
        });
    </script>
</section>
</html>