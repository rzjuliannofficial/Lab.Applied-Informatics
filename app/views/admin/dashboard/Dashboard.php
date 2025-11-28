<?php ob_start(); ?>
<div id="welcome-alert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 flex justify-between items-center rounded-r-lg shadow-sm transition-opacity duration-500" role="alert">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-xl"></i>
                        <div>
                            <p class="font-bold">Sukses!</p>
                            <p class="text-sm">Selamat datang kembali, <?= $_SESSION['user']['id_dosen']; ?></p>
                        </div>
                    </div>
                    <button id="close-alert-btn" class="text-green-700 hover:text-green-900 transition-colors p-2">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
<!-- Statistik Kartu -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <!-- Total Dosen -->
    <div class="bg-white rounded-lg shadow-lg p-6 border-b-4 border-blue-400">
        <div class="flex justify-between items-center">
            <i class="fas fa-users text-4xl text-blue-500"></i>
            <h3 class="text-4xl font-bold text-gray-800"><?= $data['totalDosen']; ?></h3>
        </div>
        <p class="text-sm text-gray-500 mt-2">Total Dosen</p>
    </div>

    <!-- User Editor -->
    <div class="bg-white rounded-lg shadow-lg p-6 border-b-4 border-green-400">
        <div class="flex justify-between items-center">
            <i class="fas fa-user-edit text-4xl text-green-500"></i>
            <h3 class="text-4xl font-bold text-gray-800"><?= $data['totalUser']; ?></h3>
        </div>
        <p class="text-sm text-gray-500 mt-2">User Editor Aktif</p>
    </div>

    <!-- Total Publikasi -->
    <div class="bg-white rounded-lg shadow-lg p-6 border-b-4 border-orange-400">
        <div class="flex justify-between items-center">
            <i class="fas fa-book text-4xl text-orange-500"></i>
            <h3 class="text-4xl font-bold text-gray-800"><?= $data['totalPublikasi']; ?></h3>
        </div>
        <p class="text-sm text-gray-500 mt-2">Total Publikasi</p>
    </div>

    <!-- Total Galeri -->
    <div class="bg-white rounded-lg shadow-lg p-6 border-b-4 border-pink-400">
        <div class="flex justify-between items-center">
            <i class="fas fa-image text-4xl text-pink-500"></i>
            <h3 class="text-4xl font-bold text-gray-800"><?= $data['totalGaleri']; ?></h3>
        </div>
        <p class="text-sm text-gray-500 mt-2">Total Galeri</p>
    </div>

</div>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
