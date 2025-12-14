<?php ob_start(); ?>

<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-800">Galeri Foto</h1>
    <p class="text-slate-500 text-sm mt-1">Koleksi foto otomatis dari modul Berita, Produk, Fasilitas, dan Kegiatan.</p>
</div>

<div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-xl mb-8 flex items-start gap-3">
    <i class="fas fa-info-circle text-blue-500 mt-1"></i>
    <div class="text-sm text-blue-900">
        <p class="font-bold">Informasi Sistem Galeri</p>
        <p class="opacity-80">Foto di halaman ini muncul secara otomatis saat Anda mengupload gambar pada modul lain. Anda hanya dapat mengedit caption atau menghapusnya dari sini.</p>
        <p class="opacity-80"><strong>Jika tidak ada caption, sementara akan muncul judul dari galeri terkait.</strong></p>
    </div>
</div>

<?php if (empty($galeri)): ?>
    <div class="text-center py-16 bg-white rounded-2xl border border-dashed border-slate-200">
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-slate-50 mb-4 text-slate-300">
            <i class="fas fa-images text-4xl"></i>
        </div>
        <h3 class="text-lg font-bold text-slate-700">Galeri Kosong</h3>
        <p class="text-slate-500 max-w-md mx-auto mt-2 text-sm">Upload konten bergambar di menu Berita, Produk, atau Fasilitas untuk mengisi galeri ini.</p>
    </div>
<?php else: ?>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    <?php foreach ($galeri as $g): ?>
        <?php
            $badgeColor = "bg-gray-100 text-gray-600";
            
            if (!empty($g['id_berita'])) { $sumber = "Berita";}
            elseif (!empty($g['id_produk'])) { $sumber = "Produk";}
            elseif (!empty($g['id_fasilitas'])) { $sumber = "Fasilitas";}
            elseif (!empty($g['id_publikasi_dosen'])) { $sumber = "Publikasi";}
            elseif (!empty($g['id_aktivitas_dosen'])) { $sumber = "Aktivitas";}
            elseif (!empty($g['id_ppm'])) { $sumber = "Pengabdian";}
            elseif (!empty($g['id_riset_dosen'])) { $sumber = "Riset";}
            elseif (!empty($g['id_kekayaan_intelektual'])) { $sumber = "HKI";}
        
            $fileUrl = $g['file_url'];
        ?>
        
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-lg transition-all duration-300 group break-inside-avoid overflow-hidden flex flex-col">
            <div class="relative group-hover:opacity-90 transition-opacity cursor-pointer">
                <a href="<?= $fileUrl ?>" target="_blank">
                    <img src="<?= $fileUrl ?>" class="w-full h-48 object-cover">
                </a>
                <span class="absolute top-3 left-3 px-2 py-1 rounded text-[10px] font-bold uppercase bg-blue-100 text-blue-700">
                    <?= $sumber ?>
                </span>
            </div>

            <div class="p-4 flex-1 flex flex-col">
                <p class="text-sm font-medium text-slate-700 mb-3 line-clamp-2 italic">
                    "<?= $g['caption'] ? htmlspecialchars($g['caption']) : 'Tanpa caption' ?>"
                </p>
                
                <div class="mt-auto pt-3 border-t border-slate-50 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center text-[10px] text-slate-500 font-bold">
                            <i class="fas fa-user"></i>
                        </div>
                        <span class="text-xs text-slate-500 truncate max-w-[80px]">
                            <?= htmlspecialchars($g['nama_uploader'] ?? 'Admin') ?>
                        </span>
                    </div>

                    <div class="flex gap-2">
                        <a href="/admin/galeri/edit/<?= htmlspecialchars($g['id']) ?>" class="text-slate-400 hover:text-amber-500 transition-colors">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/admin/galeri/delete/<?= htmlspecialchars($g['id']) ?>" onclick="return confirm('Hapus foto ini?')" class="text-slate-400 hover:text-red-500 transition-colors">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php endif; ?>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>