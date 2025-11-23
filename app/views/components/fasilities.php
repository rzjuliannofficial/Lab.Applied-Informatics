
<style>
    @keyframes scroll-logos {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%); /* Menggulir separuh lebar track untuk looping */
            }
        }

        /* Kelas untuk kontainer karosel */
        .point-carousel-container {
            width: 100%;
            background-color: transparent;
            overflow: hidden; /* Menyembunyikan bagian yang sedang bergerak */
            white-space: nowrap;
            border-radius: 10px;
            padding: 0; /* Padding disesuaikan */
            position: relative;
        }

        /* Wrapper tempat semua logo (asli + duplikat) berada */
        .point-carousel-track {
            display: inline-block;
            width: 200%; /* Penting: Harus dua kali lebar konten untuk looping mulus */
            animation: scroll-logos 30s linear infinite; /* Animasi utama */
        }
</style>

<div class="shadow-bar-top">
<!-- Div untuk Glow Setengah Lingkaran -->
       <div class="half-circle-glow"></div>
</div>

<section class="bg-white text-gray-800 section">
    <div class="max-w-[1200px] mx-auto px-5 py-12 pt-[2rem] pb-[2rem]">
        <!-- Header -->
        <div class="project header">
            <div class="title">
            <!-- Ikon Grup Orang (SVG Inline) -->
                <i class="fa-solid fa-building text-sm mr-2"></i> OUR FACILITIES
            </div>
            <p class="secondary-title">Explore Our Space <span>Space</span></p>
            <p class="text-center text-gray-500 mb-12">Comfort and convenience, designed just for you.</p>
        </div>

        <!-- ROW 1: Teks (1/3) - Gambar (2/3) -->
        <div class="flex flex-col md:flex-row gap-6 mb-8 h-auto md:h-[400px]"  data-aos="fade-up" data-aos-duration="1000">
            <!-- Deskripsi (1/3) -->
            <div class="w-full md:w-1/3 bg-blue-50 rounded-[30px] p-8 flex flex-col justify-center shadow-[0px_5px_10px_rgba(5,0,5,0.05)] transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(6,182,212,0.15)]">
                <h2 class="text-2xl font-bold mb-4 underline decoration-blue-500 underline-offset-8">
                    Pusat Riset Akademik
                </h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Menawarkan ruang laboratorium nyaman dengan software pengembangan lengkap seperti VS Code, Android Studio, dan database server berkecepatan tinggi.
                </p>
                <div class="flex flex-wrap gap-2 h-8 sm:h-11 point-carousel-container">
                    <div class="point-carousel-track">
                        <span class="bg-white px-3 py-1 mr-1 rounded-full text-xs font-bold text-blue-500 shadow-sm">✔ High Speed WiFi</span>
                        <span class="bg-white px-3 py-1 mr-1 rounded-full text-xs font-bold text-blue-500 shadow-sm">✔ Full AC</span>
                        <span class="bg-white px-3 py-1 mr-1 rounded-full text-xs font-bold text-blue-500 shadow-sm">✔ Proyektor</span>
                        <span class="bg-white px-3 py-1 mr-1 rounded-full text-xs font-bold text-blue-500 shadow-sm">✔ Soundproof</span>
                    </div>
                </div>
            </div>

            <!-- Gambar (2/3) -->
            <div class="w-full md:w-2/3 rounded-[30px] overflow-hidden shadow-sm h-64 md:h-full relative group" data-aos="fade-up" data-aos-duration="1500">
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2301&auto=format&fit=crop" 
                     alt="Lab Space" 
                     class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                <!-- Overlay Gradient (Opsional) -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
            </div>
        </div>

        <!-- ROW 2: Gambar (2/3) - Teks (1/3) [KEBALIKANNYA] -->
        <!-- Karena lebar 2/3 sama dengan gambar atas, maka ukurannya akan identik -->
        <div class="flex flex-col md:flex-row gap-6 h-auto md:h-[400px]"  data-aos="fade-up" data-aos-duration="1000">
            <!-- Gambar (2/3) - Ditaruh di kiri -->
            <div class="w-full md:w-2/3 rounded-[30px] overflow-hidden shadow-sm h-64 md:h-full relative group order-2 md:order-1" >
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2301&auto=format&fit=crop" 
                     alt="Meeting Room" 
                     class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
            </div>

            <!-- Gambar (1/3) - Ditaruh di kanan -->
            <div class="w-full md:w-1/3 rounded-[30px] overflow-hidden shadow-sm h-64 md:h-full relative group order-1 md:order-2" data-aos="fade-up" data-aos-duration="1500">
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2301&auto=format&fit=crop" 
                    alt="Meeting Room" 
                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
            </div>
        </div>
    </div>
</section>

<div class="shadow-bar-top">
<!-- Div untuk Glow Setengah Lingkaran -->
    <div class="half-circle-glow"></div>
</div>