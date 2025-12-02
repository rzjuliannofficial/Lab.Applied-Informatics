<?php ob_start(); ?>
<div id="welcome-alert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 flex justify-between items-center rounded-r-lg shadow-sm transition-opacity duration-500" role="alert">
    <div class="flex items-center gap-3">
        <i class="fas fa-check-circle text-xl"></i>
        <div>
            <p class="font-bold">Sukses!</p>
            <p class="text-sm">Selamat datang kembali, <?= $_SESSION['user']['nama_dosen']; ?></p>
        </div>
    </div>
    <button id="close-alert-btn" class="text-green-700 hover:text-green-900 transition-colors p-2">
        <i class="fas fa-times text-lg"></i>
    </button>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1: Anggota -->
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 p-5 border-b-4 border-blue-500 flex flex-col justify-between h-32">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Anggota Lab</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1"><?= $data['totalDosen']; ?></h3>
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
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Total Publikasi</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1"><?= $data['totalPublikasi']; ?></h3>
                </div>
                <div class="p-2 bg-yellow-50 rounded-lg">
                    <i class="fas fa-book text-xl text-yellow-500"></i>
                </div>
            </div>
            <div class="text-xs text-gray-400 mt-2">Menunggu persetujuan</div>
        </div>
        <!-- Card 3: Riset -->
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 p-5 border-b-4 border-green-500 flex flex-col justify-between h-32">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Total Galeri</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1"><?= $data['totalGaleri']; ?></h3>
                </div>
                <div class="p-2 bg-green-50 rounded-lg">
                    <i class="fas fa-image text-xl text-green-500"></i>
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
                    <h3 class="text-3xl font-bold text-gray-800 mt-1"><?= $data['totalEditor']; ?></h3>
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
            <a href="berita" class="w-full mt-2 py-2 px-4 bg-indigo-50 hover:bg-indigo-100 text-indigo-600 rounded-lg text-sm font-medium flex items-center justify-center gap-2 transition-colors group-hover:bg-indigo-600 group-hover:text-white">
                <i class="fas fa-plus-circle"></i> Tambah Berita
            </a>
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
            <a href="produk" class="w-full mt-2 py-2 px-4 bg-teal-50 hover:bg-teal-100 text-teal-600 rounded-lg text-sm font-medium flex items-center justify-center gap-2 transition-colors group-hover:bg-teal-600 group-hover:text-white">
                <i class="fas fa-plus-circle"></i> Tambah Produk
            </a>
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
            <a href="galeri" class="w-full mt-2 py-2 px-4 bg-purple-50 hover:bg-purple-100 text-purple-600 rounded-lg text-sm font-medium flex items-center justify-center gap-2 transition-colors group-hover:bg-purple-600 group-hover:text-white">
                <i class="fas fa-plus-circle"></i> Upload Foto
            </a>
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
            <a href="partner" class="w-full mt-2 py-2 px-4 bg-orange-50 hover:bg-orange-100 text-orange-600 rounded-lg text-sm font-medium flex items-center justify-center gap-2 transition-colors group-hover:bg-orange-600 group-hover:text-white">
                <i class="fas fa-plus-circle"></i> Tambah Partner
            </a>
        </div>

    </div>
<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
<script>
// dasboard
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
