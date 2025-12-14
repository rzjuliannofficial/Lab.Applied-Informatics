<?php ob_start(); ?>

<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Partnership</h1>
        <p class="text-slate-500 text-sm mt-1">Daftar mitra industri dan universitas.</p>
    </div>
    
    <a href="/admin/partner/create" class="group relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-medium text-white transition-all duration-200 bg-gradient-to-r from-blue-600 to-blue-800 rounded-full hover:from-blue-700 hover:to-blue-900 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50">
        <i class="fas fa-plus mr-2"></i> Tambah Partner
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    <?php foreach ($partners as $partner): ?>
        <div class="bg-white rounded-2xl border border-slate-100 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] hover:shadow-[0_8px_30px_-4px_rgba(0,0,0,0.1)] transition-all duration-300 hover:-translate-y-1 flex flex-col group overflow-hidden">
            
            <div class="h-40 bg-slate-50 flex items-center justify-center p-6 relative border-b border-slate-100">
                <?php if ($partner['logo']): ?>
                    <img src="<?= htmlspecialchars($partner['logo']) ?>" class="max-h-full max-w-full object-contain filter grayscale group-hover:grayscale-0 transition-all duration-500 transform group-hover:scale-110">
                <?php else: ?>
                    <div class="text-slate-300 text-4xl"><i class="fas fa-building"></i></div>
                <?php endif; ?>

                <span class="absolute top-3 right-3 bg-white/90 backdrop-blur text-blue-600 text-[10px] font-bold px-2 py-1 rounded shadow-sm border border-slate-100 uppercase tracking-wide">
                    <?= htmlspecialchars($partner['kategori']) ?>
                </span>
            </div>

            <div class="p-5 flex-1 flex flex-col">
                <h3 class="text-lg font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">
                    <?= htmlspecialchars($partner['nama']) ?>
                </h3>
                
                <p class="text-sm text-slate-500 mb-4 line-clamp-2 flex-1">
                    <?= htmlspecialchars($partner['deskripsi']) ?>
                </p>

                <?php if(!empty($partner['website'])): ?>
                    <a href="<?= htmlspecialchars($partner['website']) ?>" target="_blank" class="text-xs font-semibold text-blue-500 hover:text-blue-700 mb-4 inline-flex items-center gap-1">
                        <i class="fas fa-globe"></i> Kunjungi Website
                    </a>
                <?php endif; ?>

                <div class="pt-4 border-t border-slate-100 flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <a href="/admin/partner/edit/<?= $partner['id'] ?>" class="p-2 text-slate-400 hover:text-amber-500 hover:bg-amber-50 rounded-lg transition-colors" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="/admin/partner/delete/<?= $partner['id'] ?>" onclick="return confirm('Hapus data ini?')" class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php if(empty($partners)): ?>
    <div class="text-center py-12">
        <p class="text-slate-500">Belum ada partner terdaftar.</p>
    </div>
<?php endif; ?>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>