<?php ob_start(); ?>

<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Aktivitas Dosen</h1>
        <p class="text-slate-500 text-sm mt-1">Dokumentasi kegiatan, seminar, dan aktivitas anggota lab.</p>
    </div>
    
    <a href="/admin/AktivitasDosen/create" class="group relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-medium text-white transition-all duration-200 bg-gradient-to-r from-blue-600 to-blue-800 rounded-full hover:from-blue-700 hover:to-blue-900 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50">
        <i class="fas fa-plus mr-2"></i> Tambah Aktivitas
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    <?php foreach ($aktivitas as $a): ?>
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col overflow-hidden group">
            
            <div class="relative h-48 bg-slate-100 overflow-hidden flex items-center justify-center">
                <?php 
                    $file = $a['file_url'] ?? '';
                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                    $isImage = in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                ?>

                <?php if ($file && $isImage): ?>
                    <img src="<?= htmlspecialchars($file) ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                <?php elseif ($file): ?>
                    <div class="flex flex-col items-center text-slate-400">
                        <i class="fas fa-file-alt text-4xl mb-2"></i>
                        <span class="text-xs uppercase font-bold"><?= $ext ?> File</span>
                    </div>
                <?php else: ?>
                    <div class="text-slate-300 text-4xl">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                <?php endif; ?>

                <div class="absolute top-3 left-3 right-3 flex justify-between items-start">
                    <span class="bg-white/90 backdrop-blur text-blue-600 text-[10px] font-bold px-2 py-1 rounded shadow-sm uppercase tracking-wide">
                        <?= htmlspecialchars($a['jenis_aktivitas']) ?>
                    </span>
                </div>
            </div>

            <div class="p-5 flex-1 flex flex-col">
                <div class="flex items-center gap-2 mb-2 text-xs text-slate-500">
                    <i class="far fa-calendar-alt"></i>
                    <?= htmlspecialchars($a['tanggal']) ?>
                </div>

                <h3 class="text-lg font-bold text-slate-800 mb-2 leading-tight group-hover:text-blue-600 transition-colors">
                    <?= htmlspecialchars($a['judul']) ?>
                </h3>
                
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center text-[10px] text-blue-600 font-bold">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="text-xs font-medium text-slate-600 truncate">
                        <?= htmlspecialchars($a['nama_dosen']) ?>
                    </span>
                </div>

                <p class="text-sm text-slate-500 line-clamp-2 mb-4 flex-1">
                    <?= htmlspecialchars($a['deskripsi']) ?>
                </p>

                <div class="pt-4 border-t border-slate-100 flex justify-between items-center mt-auto">
                    <?php if ($file): ?>
                        <a href="<?= htmlspecialchars($file) ?>" target="_blank" class="text-xs font-bold text-blue-500 hover:underline flex items-center gap-1">
                            <i class="fas fa-external-link-alt"></i> Lihat File
                        </a>
                    <?php else: ?>
                        <span></span>
                    <?php endif; ?>

                    <div class="flex gap-2">
                        <a href="/admin/AktivitasDosen/edit/<?= $a['id'] ?>" class="p-1.5 text-slate-400 hover:text-amber-500 transition-colors">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/admin/AktivitasDosen/delete/<?= $a['id'] ?>" onclick="return confirm('Hapus data ini?')" class="p-1.5 text-slate-400 hover:text-red-500 transition-colors">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php if(empty($aktivitas)): ?>
    <div class="text-center py-12">
        <p class="text-slate-500">Belum ada aktivitas tercatat.</p>
    </div>
<?php endif; ?>

<?php $content = ob_get_clean(); include "../app/views/admin/layouts/master.php"; ?>