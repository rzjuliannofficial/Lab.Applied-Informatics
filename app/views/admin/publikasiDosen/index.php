<?php ob_start(); ?>

<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Publikasi Ilmiah</h1>
        <p class="text-slate-500 text-sm mt-1">Koleksi jurnal, paper, dan karya ilmiah dosen.</p>
    </div>
    
    <a href="/admin/PublikasiDosen/create" class="group relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-medium text-white transition-all duration-200 bg-gradient-to-r from-blue-600 to-cyan-500 rounded-full hover:from-blue-700 hover:to-cyan-600 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50">
        <i class="fas fa-plus mr-2"></i> Tambah Publikasi
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
    <?php foreach ($publikasi as $p): ?>
        <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] hover:shadow-[0_8px_30px_-4px_rgba(0,0,0,0.1)] transition-all duration-300 hover:-translate-y-1 group relative">
            
            <div class="absolute top-0 right-0 p-6 opacity-5 group-hover:opacity-10 transition-opacity">
                <i class="fas fa-quote-right text-6xl text-blue-600"></i>
            </div>

            <div class="flex justify-between items-start mb-4">
                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-blue-50 text-blue-600 border border-blue-100">
                    <?= htmlspecialchars($p['tahun']) ?>
                </span>
                <span class="text-xs font-medium text-slate-400 uppercase tracking-wide">
                    <?= htmlspecialchars($p['kategori']) ?>
                </span>
            </div>

            <h3 class="text-lg font-bold text-slate-800 mb-2 leading-snug group-hover:text-blue-600 transition-colors">
                <?= htmlspecialchars($p['judul']) ?>
            </h3>
            
            <div class="flex items-center gap-2 mb-4">
                <i class="fas fa-user-circle text-slate-400"></i>
                <span class="text-sm font-medium text-slate-600">
                    <?= htmlspecialchars($p['nama_dosen'] ?? 'Tim Dosen') ?>
                </span>
            </div>

            <?php if(!empty($p['deskripsi'])): ?>
                <p class="text-sm text-slate-500 mb-5 line-clamp-2">
                    <?= htmlspecialchars($p['deskripsi']) ?>
                </p>
            <?php endif; ?>

            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <div class="flex gap-2">
                    <a href="/admin/PublikasiDosen/edit/<?=$p['id'] ?>" class="p-1.5 text-slate-400 hover:text-amber-600 transition-colors" title="Edit">
                        <i class="fas fa-pen"></i>
                    </a>
                    <a href="/admin/PublikasiDosen/delete/<?= $p['id'] ?>" onclick="return confirm('Hapus data ini?')" class="p-1.5 text-slate-400 hover:text-red-600 transition-colors" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>

                <?php if(!empty($p['link_jurnal'])): ?>
                    <a href="<?= htmlspecialchars($p['link_jurnal']) ?>" target="_blank" class="text-sm font-semibold text-blue-600 hover:text-blue-800 flex items-center gap-1">
                        Read Paper <i class="fas fa-external-link-alt text-xs"></i>
                    </a>
                <?php endif; ?>
            </div>

        </div>
    <?php endforeach; ?>
</div>

<?php if(empty($publikasi)): ?>
    <div class="text-center py-12">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4 text-slate-400">
            <i class="fas fa-book-open text-2xl"></i>
        </div>
        <h3 class="text-lg font-medium text-slate-900">Belum ada publikasi</h3>
        <p class="text-slate-500">Tambahkan jurnal atau paper ilmiah.</p>
    </div>
<?php endif; ?>

<?php 
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>