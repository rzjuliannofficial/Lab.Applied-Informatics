<?php ob_start(); ?>

<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Berita & Aktivitas</h1>
        <p class="text-slate-500 text-sm mt-1">Publikasikan kegiatan dan informasi terbaru.</p>
    </div>
    
    <a href="/admin/Berita/create" class="group relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-medium text-white transition-all duration-200 bg-gradient-to-r from-pink-600 to-rose-600 rounded-full hover:from-pink-700 hover:to-rose-700 shadow-lg shadow-pink-500/30 hover:shadow-pink-500/50">
        <i class="fas fa-pen-nib mr-2"></i> Tulis Berita
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($berita as $b): ?>
        <div class="bg-white rounded-2xl border border-slate-100 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] hover:shadow-[0_8px_30px_-4px_rgba(0,0,0,0.1)] transition-all duration-300 flex flex-col overflow-hidden h-full group">
            
            <div class="relative h-48 bg-slate-100 overflow-hidden">
                <?php if (!empty($b['gambar_utama'])): ?>
                    <img src="<?= htmlspecialchars($b['gambar_utama']) ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                <?php else: ?>
                    <div class="flex items-center justify-center h-full text-slate-300">
                        <i class="fas fa-image text-4xl"></i>
                    </div>
                <?php endif; ?>
                
                <span class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-rose-600 text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                    <?= htmlspecialchars($b['kategori']) ?>
                </span>
            </div>

            <div class="p-6 flex-1 flex flex-col">
                <div class="text-xs text-slate-400 mb-2 flex items-center gap-2">
                    <i class="far fa-calendar-alt"></i>
                    <?= date('d M Y', strtotime($b['tanggal'])) ?>
                </div>

                <h3 class="text-lg font-bold text-slate-800 mb-3 line-clamp-2 leading-tight group-hover:text-rose-600 transition-colors">
                    <?= htmlspecialchars($b['judul']) ?>
                </h3>
                
                <p class="text-slate-500 text-sm line-clamp-3 mb-4 flex-1">
                    <?= strip_tags(htmlspecialchars_decode($b['isi_berita'])) ?>
                </p>

                <div class="pt-4 border-t border-slate-100 flex justify-between items-center mt-auto">
                    <a href="/admin/Berita/edit/<?= $b['id'] ?>" class="text-xs font-medium text-slate-500 hover:text-amber-600 flex items-center gap-1 transition-colors">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="/admin/Berita/delete/<?= $b['id'] ?>" onclick="return confirm('Hapus berita ini?')" class="text-xs font-medium text-slate-500 hover:text-red-600 flex items-center gap-1 transition-colors">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php if(empty($berita)): ?>
    <div class="text-center py-12">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4 text-slate-400">
            <i class="far fa-newspaper text-2xl"></i>
        </div>
        <h3 class="text-lg font-medium text-slate-900">Belum ada berita</h3>
        <p class="text-slate-500">Mulai tulis berita pertama sekarang.</p>
    </div>
<?php endif; ?>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>