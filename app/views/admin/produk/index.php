<?php ob_start(); ?>

<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Produk Hilirisasi</h1>
        <p class="text-slate-500 text-sm mt-1">Karya dan produk inovasi laboratorium.</p>
    </div>
    
    <a href="/admin/Produk/create" class="group relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-medium text-white transition-all duration-200 bg-gradient-to-r from-blue-600 to-blue-800 rounded-full hover:from-blue-700 hover:to-blue-900 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50">
        <i class="fas fa-plus mr-2"></i> Tambah Produk
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    <?php foreach ($produk as $p): ?>
        <div class="bg-white rounded-2xl border border-slate-100 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] hover:shadow-[0_8px_30px_-4px_rgba(0,0,0,0.1)] transition-all duration-300 group overflow-hidden">
            
            <div class="relative h-48 bg-slate-100 overflow-hidden">
                <?php if ($p['image']): ?>
                    <img src="<?= htmlspecialchars($p['image']) ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                <?php else: ?>
                    <div class="flex items-center justify-center h-full text-slate-300">
                        <i class="fas fa-box-open text-4xl"></i>
                    </div>
                <?php endif; ?>

                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-60"></div>
                
                <span class="absolute bottom-4 left-4 text-white text-xs font-bold tracking-wide uppercase bg-blue-600/80 backdrop-blur px-2 py-1 rounded">
                    <?= htmlspecialchars($p['kategori']) ?>
                </span>
            </div>

            <div class="p-5">
                <h3 class="text-lg font-bold text-slate-800 mb-4 group-hover:text-blue-600 transition-colors truncate">
                    <?= htmlspecialchars($p['nama_produk']) ?>
                </h3>

                <div class="flex justify-between items-center pt-4 border-t border-slate-100">
                     <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Actions</span>
                     <div class="flex gap-2">
                        <a href="/admin/Produk/edit/<?= $p['id'] ?>" class="p-1.5 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 transition-colors" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/admin/Produk/delete/<?= $p['id'] ?>" onclick="return confirm('Hapus produk ini?')" class="p-1.5 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors" title="Hapus">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                     </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php if(empty($produk)): ?>
    <div class="text-center py-12">
        <p class="text-slate-500">Belum ada produk inovasi.</p>
    </div>
<?php endif; ?>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>