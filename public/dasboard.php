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
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-thumb { background: #475569; border-radius: 4px; }
        ::-webkit-scrollbar-track { background: #E5E7EB; }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex">

    <!-- 1. Sidebar (Sesuai Referensi, Tema Gelap) -->
    <?php include 'sidebar.php'; ?>

    <!-- 2. Konten Utama dan Header Atas -->
    <div class="flex-1 md:ml-64">
        <!-- Header Atas (Topbar) -->
        <header class="bg-white shadow-md p-4 flex justify-between items-center fixed w-full md:w-[calc(100%-16rem)] z-30">
            <h1 class="text-xl font-semibold text-gray-800">Dashboard</h1>
            <div class="flex items-center space-x-4">
                <button class="text-gray-500 hover:text-gray-700 relative">
                    <i class="fas fa-bell"></i>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
                <button class="text-gray-500 hover:text-gray-700 relative">
                    <i class="fas fa-envelope"></i>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
                <a href="#" class="flex items-center text-gray-700 hover:text-accent">
                    <img src="https://placehold.co/30x30/02416D/ffffff?text=UG" alt="Admin" class="w-8 h-8 rounded-full mr-2">
                    <span class="hidden sm:inline">Logout</span>
                    <i class="fas fa-sign-out-alt ml-2"></i>
                </a>
            </div>
        </header>

        <!-- Area Konten Utama Dashboard -->
        <main class="p-6 pt-20">

            <!-- Notifikasi Sukses (Sesuai Referensi Gambar) -->
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 flex justify-between items-center rounded-lg" role="alert">
                <p class="font-bold">Sukses!</p>
                <p>Selamat datang kembali, Unggul Wibowo!</p>
                <button class="text-green-700 hover:text-green-900">&times;</button>
            </div>

            <!-- Kartu Statistik (Sesuai Referensi Gambar) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <!-- Kartu 1: Total Anggota Lab (Biru Muda) -->
                <div class="bg-white rounded-lg shadow-lg p-6 border-b-4 border-blue-400">
                    <div class="flex justify-between items-center">
                        <i class="fas fa-users text-4xl text-blue-500"></i>
                        <h3 class="text-4xl font-bold text-gray-800">25</h3>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Total Anggota Lab</p>
                </div>

                <!-- Kartu 2: Konten Menunggu Persetujuan (Kuning) -->
                <div class="bg-white rounded-lg shadow-lg p-6 border-b-4 border-yellow-400">
                    <div class="flex justify-between items-center">
                        <i class="fas fa-clock text-4xl text-yellow-500"></i>
                        <h3 class="text-4xl font-bold text-gray-800">12</h3>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Menunggu Persetujuan</p>
                </div>

                <!-- Kartu 3: Total Riset Publik (Hijau) -->
                <div class="bg-white rounded-lg shadow-lg p-6 border-b-4 border-green-400">
                    <div class="flex justify-between items-center">
                        <i class="fas fa-flask text-4xl text-green-500"></i>
                        <h3 class="text-4xl font-bold text-gray-800">1,805</h3>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Total Riset Publik</p>
                </div>

                <!-- Kartu 4: User Editor Aktif (Merah Muda) -->
                <div class="bg-white rounded-lg shadow-lg p-6 border-b-4 border-pink-400">
                    <div class="flex justify-between items-center">
                        <i class="fas fa-pen-nib text-4xl text-pink-500"></i>
                        <h3 class="text-4xl font-bold text-gray-800">54</h3>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">User Editor Aktif</p>
                </div>
            </div>

            <!-- Kartu Sosial Media (Diubah menjadi Publikasi/Aktivitas) -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Kartu 1: Riset Terbaru (Biru Tua) -->
                <div class="bg-blue-800 text-white rounded-lg shadow-lg p-6 transition duration-300 hover:bg-blue-900">
                    <i class="fas fa-book-open text-3xl mb-3"></i>
                    <p class="text-2xl font-bold">1.5k</p>
                    <p class="text-sm">Total Publikasi SINTA</p>
                    <p class="text-xs mt-2 text-blue-200">25 Aktif</p>
                </div>

                <!-- Kartu 2: Pengabdian Masyarakat (Cyan) -->
                <div class="bg-cyan-500 text-white rounded-lg shadow-lg p-6 transition duration-300 hover:bg-cyan-600">
                    <i class="fas fa-hand-holding-heart text-3xl mb-3"></i>
                    <p class="text-2xl font-bold">58</p>
                    <p class="text-sm">Kegiatan Pengabdian</p>
                    <p class="text-xs mt-2 text-cyan-100">9 Laporan Selesai</p>
                </div>

                <!-- Kartu 3: Kolaborasi Internasional (Indigo) -->
                <div class="bg-indigo-600 text-white rounded-lg shadow-lg p-6 transition duration-300 hover:bg-indigo-700">
                    <i class="fas fa-globe text-3xl mb-3"></i>
                    <p class="text-2xl font-bold">75+</p>
                    <p class="text-sm">Mitra Internasional</p>
                    <p class="text-xs mt-2 text-indigo-300">12 MoU Aktif</p>
                </div>

                <!-- Kartu 4: Galeri Unggulan (Oranye) -->
                <div class="bg-accent text-white rounded-lg shadow-lg p-6 transition duration-300 hover:bg-orange-600">
                    <i class="fas fa-camera text-3xl mb-3"></i>
                    <p class="text-2xl font-bold">450</p>
                    <p class="text-sm">Total Foto Galeri</p>
                    <p class="text-xs mt-2 text-orange-300">8 Album Terbaru</p>
                </div>
            </div>

            <!-- Area Grafik/Detail -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Grafik Utama (Placeholder) -->
                <div class="lg:col-span-2 bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-lg font-semibold mb-4">Tren Konten & Trafik (Data Dummy)</h2>
                    <div class="h-80 bg-gray-50 flex items-center justify-center text-gray-400 border border-gray-200 rounded-lg">
                        [Placeholder Area Grafik: Implementasi jQuery ChartJS]
                    </div>
                </div>

                <!-- Kartu Profil Cepat/KPI Samping -->
                <div class="space-y-6">
                    <!-- Kartu Profil Pengelola -->
                    <div class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-blue-500">
                        <div class="flex items-center space-x-4">
                            <img src="https://placehold.co/60x60/38bdf8/ffffff?text=ADM" alt="Profile" class="w-16 h-16 rounded-full object-cover">
                            <div>
                                <p class="font-bold text-lg">Jim Doe</p>
                                <p class="text-sm text-blue-600">Project Manager</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 text-center mt-4 border-t pt-4">
                            <div>
                                <p class="font-bold">750</p>
                                <p class="text-xs text-gray-500">Riset</p>
                            </div>
                            <div>
                                <p class="font-bold">865</p>
                                <p class="text-xs text-gray-500">Konten</p>
                            </div>
                            <div>
                                <p class="font-bold">3645</p>
                                <p class="text-xs text-gray-500">Followers</p>
                            </div>
                        </div>
                    </div>

                    <!-- Kartu Metrik Tambahan -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex justify-between items-center mb-4">
                            <i class="fas fa-dollar-sign text-green-500 text-2xl"></i>
                            <h3 class="text-lg font-semibold">Total Grant</h3>
                        </div>
                        <p class="text-3xl font-bold text-gray-800">Rp 1.012 Jt</p>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex justify-between items-center mb-4">
                            <i class="fas fa-user-plus text-blue-500 text-2xl"></i>
                            <h3 class="text-lg font-semibold">Mahasiswa Baru</h3>
                        </div>
                        <p class="text-3xl font-bold text-gray-800">961</p>
                    </div>
                </div>

            </div>
        </main>

        <!-- Footer Admin -->
        <footer class="bg-gray-800 text-gray-400 p-3 text-center text-sm mt-6">
            &copy; 2025 AI Lab Polinema. Admin Panel v1.0.
        </footer>
    </div>
</body>
</html>