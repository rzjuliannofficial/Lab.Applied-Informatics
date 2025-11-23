
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
            height: 450px;
            perspective: 1000px;
            overflow: hidden;
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
        .btn-prev-custom { left: 10%; } 
        .btn-next-custom { right: 10%; }
        
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
                <i class="fas fa-cloud text-xs mr-2"></i> LATEST NEWS
            </div>
            <p class="secondary-title">Hot Off the <span>Press</span></p>
            <p class="text-center text-gray-500 mb-12">The most recent updates, all in one place.</p>
        </div>

        <!-- Carousel Container (Pusat Logika Cover Flow) -->
        <div class="carousel-wrapper-3d">
            
            <!-- Item 1 -->
            <div class="carousel-item-3d bg-white shadow-xl rounded-xl p-4 active" data-index="0">
                <div class="image-placeholder rounded-lg"></div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">AI Talk Series: Introduction to Big Data Analytics</h3>
                <div class="flex space-x-2 text-xs mb-3">
                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full">Tech Series</span>
                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full">Big Data</span>
                </div>
                <p class="text-sm text-gray-500">Tokopedia UI AI Center of Excellence kembali menggelar acara AI Talk Series dengan tema "Introduction of Big Data Analytics".</p>
            </div>

            <!-- Item 2 -->
            <div class="carousel-item-3d bg-white shadow-xl rounded-xl p-4 next" data-index="1">
                <div class="image-placeholder rounded-lg"></div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Tantangan Keamanan Siber di Era Remote Working</h3>
                <div class="flex space-x-2 text-xs mb-3">
                    <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full">Security</span>
                    <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full">WFH</span>
                </div>
                <p class="text-sm text-gray-500">Bagaimana perusahaan harus beradaptasi dengan ancaman keamanan siber yang meningkat saat karyawan bekerja dari rumah.</p>
            </div>

            <!-- Item 3 -->
            <div class="carousel-item-3d bg-white shadow-xl rounded-xl p-4 hidden" data-index="2">
                <div class="image-placeholder rounded-lg"></div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Laporan Tren E-commerce Kuartal Terbaru</h3>
                <div class="flex space-x-2 text-xs mb-3">
                    <span class="px-2 py-1 bg-indigo-100 text-indigo-700 rounded-full">Bisnis</span>
                    <span class="px-2 py-1 bg-pink-100 text-pink-700 rounded-full">Marketplace</span>
                </div>
                <p class="text-sm text-gray-500">Analisis mendalam tentang pertumbuhan dan pergeseran perilaku konsumen di pasar digital Indonesia.</p>
            </div>
            
            <!-- Item 4 -->
            <div class="carousel-item-3d bg-white shadow-xl rounded-xl p-4 hidden" data-index="3">
                <div class="image-placeholder rounded-lg"></div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Inovasi Teknologi Hijau di Indonesia</h3>
                <div class="flex space-x-2 text-xs mb-3">
                    <span class="px-2 py-1 bg-lime-100 text-lime-700 rounded-full">Environment</span>
                    <span class="px-2 py-1 bg-gray-100 text-gray-700 rounded-full">Inovasi</span>
                </div>
                <p class="text-sm text-gray-500">Melihat perkembangan startup yang berfokus pada solusi ramah lingkungan menggunakan teknologi.</p>
            </div>

            <!-- Item 5 -->
            <div class="carousel-item-3d bg-white shadow-xl rounded-xl p-4 hidden" data-index="4">
                <div class="image-placeholder rounded-lg"></div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Krisis Semikonduktor Global: Dampak dan Solusi</h3>
                <div class="flex space-x-2 text-xs mb-3">
                    <span class="px-2 py-1 bg-gray-800 text-white rounded-full">Supply Chain</span>
                    <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full">Ekonomi</span>
                </div>
                <p class="text-sm text-gray-500">Meninjau bagaimana kekurangan chip global mempengaruhi manufaktur elektronik dan otomotif di seluruh dunia.</p>
            </div>
            
            <!-- Item 6 -->
            <div class="carousel-item-3d bg-white shadow-xl rounded-xl p-4 hidden" data-index="5">
                <div class="image-placeholder rounded-lg"></div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Proyek Ambisius AI Generatif Mengguncang Industri Kreatif</h3>
                <div class="flex space-x-2 text-xs mb-3">
                    <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded-full">AI Generatif</span>
                    <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full">Kreatif</span>
                </div>
                <p class="text-sm text-gray-500">Peran kecerdasan buatan dalam menciptakan konten visual dan tekstual, serta tantangan etika yang menyertainya.</p>
            </div>

            <!-- Item 7 -->
            <div class="carousel-item-3d bg-white shadow-xl rounded-xl p-4 prev" data-index="6">
                <div class="image-placeholder rounded-lg"></div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Masa Depan Transportasi: Uji Coba Mobil Otonom</h3>
                <div class="flex space-x-2 text-xs mb-3">
                    <span class="px-2 py-1 bg-gray-800 text-white rounded-full">Otomotif</span>
                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full">Inovasi</span>
                </div>
                <p class="text-sm text-gray-500">Laporan terbaru mengenai keberhasilan uji coba kendaraan tanpa pengemudi di beberapa kota metropolitan Asia.</p>
            </div>

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