    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Admin | Lab AI Polinema</title>
        <!-- CDN Tailwind CSS - Digunakan untuk styling -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            /* Konfigurasi Warna Khusus Lab AI */
            :root {
                --color-primary: #02416D; /* Biru Tua */
                --color-accent: #F97316; /* Oranye */
                --color-sidebar-bg: #1F2937; /* Sidebar Gelap */
                --color-text-light: #E5E7EB;
            }

            /* Kelas Tailwind Kustom (Digunakan untuk demo) */
            .sidebar-bg { background-color: var(--color-sidebar-bg); }
            .bg-primary { background-color: var(--color-primary); }
            .text-accent { color: var(--color-accent); }

            /* Scrollbar Styling (Opsional, untuk estetika) */

            ::-webkit-scrollbar { width: 6px; }
            ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
            ::-webkit-scrollbar-track { background: #f1f5f9; }
        </style>
    </head>

    <body class="bg-gray-100 min-h-screen flex text-sm md:text-base">

        <!-- 1. Sidebar (Sesuai Referensi, Tema Gelap) -->
        <?php include 'sidebar.php'; ?>

        <!-- ================= MAIN CONTENT ================= -->
        <div class="flex-1 md:ml-64 flex flex-col relative">
            
            <!-- Header / Topbar -->
            <header class="bg-white shadow-sm h-16 flex justify-between items-center px-6 sticky top-0 z-30">
                <button class="md:hidden text-gray-600 hover:text-gray-900 focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>

                <h2 class="hidden md:block text-lg font-semibold text-gray-700">Dashboard</h2>

                <div class="flex items-center gap-4 md:gap-6">
                    <button class="text-gray-500 hover:text-blue-600 relative transition-colors">
                        <i class="fas fa-bell text-lg"></i>
                        <span class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full ring-2 ring-white"></span>
                    </button>
                    <button class="text-gray-500 hover:text-blue-600 relative transition-colors">
                        <i class="fas fa-envelope text-lg"></i>
                    </button>
                    
                    <div class="h-8 w-px bg-gray-200 mx-1"></div>

                    <div class="flex items-center gap-3 cursor-pointer hover:bg-gray-50 p-1 rounded-lg transition">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-semibold text-gray-700 leading-none">Nabhan Rizqi</p>
                            <p class="text-xs text-gray-500 mt-1">Super Admin</p>
                        </div>
                        <img src="https://ui-avatars.com/api/?name=Nabhan+Rizqi&background=02416D&color=fff" alt="Profile" class="w-9 h-9 rounded-full border-2 border-gray-100 shadow-sm">
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6 overflow-y-auto">

                <!-- ALERT HIJAU -->
                <div id="welcome-alert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 flex justify-between items-center rounded-r-lg shadow-sm transition-opacity duration-500" role="alert">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-xl"></i>
                        <div>
                            <p class="font-bold">Sukses!</p>
                            <p class="text-sm">Selamat datang kembali, Unggul Wibowo!</p>
                        </div>
                    </div>
                    <button id="close-alert-btn" class="text-green-700 hover:text-green-900 transition-colors p-2">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>


                <!-- Summary Cards (Bagian Atas - Tetap Ada) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Card 1: Anggota -->
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 p-5 border-b-4 border-blue-500 flex flex-col justify-between h-32">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Anggota Lab</p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-1">25</h3>
                            </div>
                            <div class="p-2 bg-blue-50 rounded-lg">
                                <i class="fas fa-users text-xl text-blue-500"></i>
                            </div>
                        </div>
                        <div class="flex items-center text-xs text-green-600 font-medium mt-2">
                            <i class="fas fa-arrow-up mr-1"></i> <span>+2 bulan ini</span>
                        </div>
                    </div>
                    <!-- Card 2: Pending -->
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 p-5 border-b-4 border-yellow-400 flex flex-col justify-between h-32">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Pending</p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-1">12</h3>
                            </div>
                            <div class="p-2 bg-yellow-50 rounded-lg">
                                <i class="fas fa-clock text-xl text-yellow-500"></i>
                            </div>
                        </div>
                        <div class="text-xs text-gray-400 mt-2">Menunggu persetujuan</div>
                    </div>
                    <!-- Card 3: Riset -->
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 p-5 border-b-4 border-green-500 flex flex-col justify-between h-32">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Riset Publik</p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-1">1,805</h3>
                            </div>
                            <div class="p-2 bg-green-50 rounded-lg">
                                <i class="fas fa-flask text-xl text-green-500"></i>
                            </div>
                        </div>
                        <div class="flex items-center text-xs text-green-600 font-medium mt-2">
                            <i class="fas fa-arrow-up mr-1"></i> <span>+12% dari tahun lalu</span>
                        </div>
                    </div>
                    <!-- Card 4: Editor -->
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 p-5 border-b-4 border-pink-500 flex flex-col justify-between h-32">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Editor Aktif</p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-1">54</h3>
                            </div>
                            <div class="p-2 bg-pink-50 rounded-lg">
                                <i class="fas fa-pen-nib text-xl text-pink-500"></i>
                            </div>
                        </div>
                        <div class="text-xs text-gray-400 mt-2">Sedang online</div>
                    </div>
                </div>

                <!-- Content Management Cards (Bagian Baru) -->
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Manajemen Konten</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    <!-- Card News -->
                    <div class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition-all duration-300 group relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                            <i class="fas fa-newspaper text-6xl text-indigo-500"></i>
                        </div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-lg bg-indigo-100 flex items-center justify-center text-indigo-600">
                                <i class="fas fa-newspaper text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Berita</h4>
                                <p class="text-xs text-gray-500">12 Artikel Aktif</p>
                            </div>
                        </div>
                        <button class="w-full mt-2 py-2 px-4 bg-indigo-50 hover:bg-indigo-100 text-indigo-600 rounded-lg text-sm font-medium flex items-center justify-center gap-2 transition-colors group-hover:bg-indigo-600 group-hover:text-white">
                            <i class="fas fa-plus-circle"></i> Tambah Berita
                        </button>
                    </div>

                    <!-- Card Product -->
                    <div class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition-all duration-300 group relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                            <i class="fas fa-box-open text-6xl text-teal-500"></i>
                        </div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-lg bg-teal-100 flex items-center justify-center text-teal-600">
                                <i class="fas fa-box-open text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Produk</h4>
                                <p class="text-xs text-gray-500">8 Produk Hilirisasi</p>
                            </div>
                        </div>
                        <button class="w-full mt-2 py-2 px-4 bg-teal-50 hover:bg-teal-100 text-teal-600 rounded-lg text-sm font-medium flex items-center justify-center gap-2 transition-colors group-hover:bg-teal-600 group-hover:text-white">
                            <i class="fas fa-plus-circle"></i> Tambah Produk
                        </button>
                    </div>

                    <!-- Card Galeri -->
                    <div class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition-all duration-300 group relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                            <i class="fas fa-images text-6xl text-purple-500"></i>
                        </div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600">
                                <i class="fas fa-images text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Galeri</h4>
                                <p class="text-xs text-gray-500">24 Album Foto</p>
                            </div>
                        </div>
                        <button class="w-full mt-2 py-2 px-4 bg-purple-50 hover:bg-purple-100 text-purple-600 rounded-lg text-sm font-medium flex items-center justify-center gap-2 transition-colors group-hover:bg-purple-600 group-hover:text-white">
                            <i class="fas fa-plus-circle"></i> Upload Foto
                        </button>
                    </div>

                    <!-- Card Partner -->
                    <div class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition-all duration-300 group relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                            <i class="fas fa-handshake text-6xl text-orange-500"></i>
                        </div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-lg bg-orange-100 flex items-center justify-center text-orange-600">
                                <i class="fas fa-handshake text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Partner</h4>
                                <p class="text-xs text-gray-500">15 Mitra Industri</p>
                            </div>
                        </div>
                        <button class="w-full mt-2 py-2 px-4 bg-orange-50 hover:bg-orange-100 text-orange-600 rounded-lg text-sm font-medium flex items-center justify-center gap-2 transition-colors group-hover:bg-orange-600 group-hover:text-white">
                            <i class="fas fa-plus-circle"></i> Tambah Partner
                        </button>
                    </div>

                </div>

            </main>

            <!-- Footer -->
            <footer class="bg-white border-t p-6 text-center text-gray-500 text-xs mt-auto">
                <p>&copy; 2025 AI Lab Polinema. Admin Panel v1.0. Developed with <i class="fas fa-heart text-red-400 mx-1"></i> by Tim IT.</p>
            </footer>
        </div>

        <!-- JavaScript untuk menutup Alert -->
        <script>
            document.getElementById('close-alert-btn').addEventListener('click', function() {
                const alertBox = document.getElementById('welcome-alert');
                // Efek fade out
                alertBox.style.opacity = '0';
                // Hapus elemen setelah transisi selesai (500ms sesuai class duration-500)
                setTimeout(function() {
                    alertBox.style.display = 'none';
                }, 500);
            });
        </script>
    </body>
    </html>