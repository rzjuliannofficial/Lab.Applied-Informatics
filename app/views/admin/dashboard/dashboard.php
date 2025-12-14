<?php ob_start(); ?>

<div class="relative bg-gradient-to-r from-blue-900 to-blue-700 rounded-3xl p-8 mb-8 text-white shadow-xl overflow-hidden">
    <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-6">
        <div>
            <h1 class="text-3xl font-bold mb-2">Selamat Datang, <?= htmlspecialchars($_SESSION['user']['nama_dosen'] ?? 'User') ?>! 👋</h1>
            <p class="text-blue-100 text-lg">
                Anda login sebagai <span class="font-bold bg-blue-600/50 px-3 py-1 rounded-lg border border-blue-400/30 capitalize"><?= $_SESSION['user']['role'] ?></span>
            </p>
            <p class="mt-4 text-sm text-blue-200 opacity-80">
                <i class="far fa-clock mr-1"></i> <?= date('l, d F Y') ?>
            </p>
        </div>
    </div>
</div>

<div class="mb-10">
    <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
        <i class="fas fa-chart-pie mr-2 text-blue-600"></i> Ringkasan Laboratorium
    </h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] border border-gray-100 flex items-center gap-4 transition-transform hover:-translate-y-1">
            <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 text-2xl">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Member</p>
                <h3 class="text-2xl font-bold text-gray-800"><?= $totalDosen ?? 0 ?></h3>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] border border-gray-100 flex items-center gap-4 transition-transform hover:-translate-y-1">
            <div class="w-14 h-14 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 text-2xl">
                <i class="fas fa-book-open"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm font-medium">Publikasi</p>
                <h3 class="text-2xl font-bold text-gray-800"><?= $totalPublikasi ?? 0 ?></h3>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] border border-gray-100 flex items-center gap-4 transition-transform hover:-translate-y-1">
            <div class="w-14 h-14 rounded-full bg-amber-50 flex items-center justify-center text-amber-600 text-2xl">
                <i class="fas fa-box-open"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm font-medium">Produk Hilirisasi</p>
                <h3 class="text-2xl font-bold text-gray-800"><?= $totalProduk ?? 0 ?></h3>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] border border-gray-100 flex items-center gap-4 transition-transform hover:-translate-y-1">
            <div class="w-14 h-14 rounded-full bg-purple-50 flex items-center justify-center text-purple-600 text-2xl">
                <i class="far fa-newspaper"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm font-medium">Berita & Artikel</p>
                <h3 class="text-2xl font-bold text-gray-800"><?= $totalBerita ?? 0 ?></h3>
            </div>
        </div>
    </div>
</div>

<div>
    <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
        <i class="fas fa-th-large mr-2 text-blue-600"></i> 
        <?= $_SESSION['user']['role'] === 'admin' ? 'Pusat Kontrol Admin' : 'Area Kerja Anda' ?>
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        
        <?php if ($_SESSION['user']['role'] === 'admin'): ?>
            <a href="/admin/user" class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-blue-200 transition-all duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-indigo-100 text-indigo-600 rounded-xl group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                        <i class="fas fa-users-cog text-xl"></i>
                    </div>
                    <span class="bg-gray-100 text-gray-600 text-xs font-bold px-2 py-1 rounded">Admin</span>
                </div>
                <h3 class="font-bold text-gray-800 text-lg group-hover:text-indigo-700">Manajemen User</h3>
                <p class="text-sm text-gray-500 mt-2">Kelola akun editor dan hak akses sistem.</p>
            </a>

            <a href="/admin/dosen" class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-blue-200 transition-all duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-xl group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <i class="fas fa-user-tie text-xl"></i>
                    </div>
                </div>
                <h3 class="font-bold text-gray-800 text-lg group-hover:text-blue-700">Data Member</h3>
                <p class="text-sm text-gray-500 mt-2">Tambah, edit, atau hapus data anggota lab.</p>
            </a>

            <a href="/admin/partner" class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-blue-200 transition-all duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-orange-100 text-orange-600 rounded-xl group-hover:bg-orange-600 group-hover:text-white transition-colors">
                        <i class="fas fa-handshake text-xl"></i>
                    </div>
                </div>
                <h3 class="font-bold text-gray-800 text-lg group-hover:text-orange-700">Partnership</h3>
                <p class="text-sm text-gray-500 mt-2">Kelola data mitra industri dan universitas.</p>
            </a>

            <a href="/admin/fasilitas" class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-blue-200 transition-all duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-teal-100 text-teal-600 rounded-xl group-hover:bg-teal-600 group-hover:text-white transition-colors">
                        <i class="fas fa-building text-xl"></i>
                    </div>
                </div>
                <h3 class="font-bold text-gray-800 text-lg group-hover:text-teal-700">Fasilitas Lab</h3>
                <p class="text-sm text-gray-500 mt-2">Update inventaris dan fasilitas laboratorium.</p>
            </a>
        <?php endif; ?>

        <?php 
            $profilLink = ($_SESSION['user']['role'] === 'editor') //role editor?
                ? "/admin/dosen/edit/" . $_SESSION['user']['id_dosen'] //jika iya
                : "/admin/dosen"; //jika bukan
            
            $profilText = ($_SESSION['user']['role'] === 'editor') 
                ? "Update Profil Saya" 
                : "Semua Profil Member";
        ?>

        <?php if ($_SESSION['user']['role'] === 'editor'): ?>
            <a href="<?= $profilLink ?>" class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-blue-200 transition-all duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-cyan-100 text-cyan-600 rounded-xl group-hover:bg-cyan-600 group-hover:text-white transition-colors">
                        <i class="fas fa-id-card text-xl"></i>
                    </div>
                    <?php if($_SESSION['user']['role'] === 'editor'): ?>
                        <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-1 rounded-full">PERSONAL</span>
                    <?php endif; ?>
                </div>
                <h3 class="font-bold text-gray-800 text-lg group-hover:text-cyan-700"><?= $profilText ?></h3>
                <p class="text-sm text-gray-500 mt-2">Perbarui biodata, foto, dan keahlian Anda.</p>
            </a>
        <?php endif; ?>

        <a href="/admin/publikasiDosen" class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-blue-200 transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-red-100 text-red-600 rounded-xl group-hover:bg-red-600 group-hover:text-white transition-colors">
                    <i class="fas fa-book text-xl"></i>
                </div>
            </div>
            <h3 class="font-bold text-gray-800 text-lg group-hover:text-red-700">Publikasi Ilmiah</h3>
            <p class="text-sm text-gray-500 mt-2">Upload jurnal atau karya tulis ilmiah terbaru.</p>
        </a>

        <a href="/admin/ppm">
            <div class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-blue-200 transition-all duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-green-100 text-green-600 rounded-xl group-hover:bg-green-600 group-hover:text-white transition-colors">
                        <i class="fas fa-hands-helping text-xl"></i>
                    </div>
                </div>
                <h3 class="font-bold text-gray-800 text-lg group-hover:text-green-700">Pengabdian pada Masyarakat</h3>
                <p class="text-sm text-gray-500 mt-2">Kelola kegiatan pengabdian laboratorium.</p>
            </div>
        </a>

        <a href="/admin/AktivitasDosen" class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-blue-200 transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-yellow-100 text-yellow-600 rounded-xl group-hover:bg-yellow-600 group-hover:text-white transition-colors">
                    <i class="fas fa-tasks text-xl"></i>
                </div>
            </div>
            <h3 class="font-bold text-gray-800 text-lg group-hover:text-yellow-700">Aktivitas & Kegiatan</h3>
            <p class="text-sm text-gray-500 mt-2">Catat dan dokumentasikan aktivitas harian Anda.</p>
        </a>

        <a href="/admin/risetDosen" class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-blue-200 transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-pink-100 text-pink-600 rounded-xl group-hover:bg-pink-600 group-hover:text-white transition-colors">
                    <i class="fas fa-microscope text-xl"></i>
                </div>
            </div>
            <h3 class="font-bold text-gray-800 text-lg group-hover:text-pink-700">Riset & Penelitian</h3>
            <p class="text-sm text-gray-500 mt-2">Dokumentasi aktivitas penelitian berjalan.</p>
        </a>
        
        <a href="/admin/kekayaanIntelektual" class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-blue-200 transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-yellow-100 text-yellow-600 rounded-xl group-hover:bg-yellow-600 group-hover:text-white transition-colors">
                    <i class="fas fa-certificate text-xl"></i>
                </div>
            </div>
            <h3 class="font-bold text-gray-800 text-lg group-hover:text-yellow-700">HKI & Paten</h3>
            <p class="text-sm text-gray-500 mt-2">Manajemen data Hak Kekayaan Intelektual.</p>
        </a>

        <?php if ($_SESSION['user']['role'] === 'admin'): ?>


            <a href="/admin/berita" class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-blue-200 transition-all duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-purple-100 text-purple-600 rounded-xl group-hover:bg-purple-600 group-hover:text-white transition-colors">
                        <i class="fas fa-pen-nib text-xl"></i>
                    </div>
                </div>
                <h3 class="font-bold text-gray-800 text-lg group-hover:text-purple-700">Berita & Artikel</h3>
                <p class="text-sm text-gray-500 mt-2">Tulis berita kegiatan terbaru laboratorium.</p>
            </a>
        <?php endif; ?>

    </div>
</div>

<?php 
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
