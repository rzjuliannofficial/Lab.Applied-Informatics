<?php ob_start(); ?>

<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Fasilitas Lab</h1>
        <p class="text-slate-500 text-sm mt-1">Inventaris dan sarana prasarana laboratorium.</p>
    </div>
    
    <a href="/admin/Fasilitas/create" class="group relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-medium text-white transition-all duration-200 bg-gradient-to-r from-blue-600 to-blue-800 rounded-full hover:from-blue-700 hover:to-blue-900 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50">
        <i class="fas fa-plus mr-2"></i> Tambah Fasilitas
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($fasilitas as $f): ?>
        <div class="bg-white rounded-2xl border border-slate-100 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] hover:shadow-[0_8px_30px_-4px_rgba(0,0,0,0.1)] transition-all duration-300 group overflow-hidden">
            
            <div class="relative h-56 overflow-hidden bg-slate-100">
                <?php if ($f['foto']): ?>
                    <img src="<?= htmlspecialchars($f['foto']) ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <?php else: ?>
                    <div class="flex items-center justify-center h-full text-slate-300">
                        <i class="fas fa-image text-4xl"></i>
                    </div>
                <?php endif; ?>

                <?php 
                    $isGood = strtolower($f['kondisi']) === 'baik';
                    $badgeColor = $isGood ? 'bg-emerald-500' : 'bg-red-500';
                    $icon = $isGood ? 'fa-check-circle' : 'fa-exclamation-circle';
                ?>
                <span class="absolute top-4 right-4 <?= $badgeColor ?> text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg flex items-center gap-1">
                    <i class="fas <?= $icon ?>"></i> <?= htmlspecialchars($f['kondisi']) ?>
                </span>
            </div>

            <div class="p-6">
                <h3 class="text-lg font-bold text-slate-800 mb-1 group-hover:text-blue-600 transition-colors">
                    <?= htmlspecialchars($f['nama_fasilitas']) ?>
                </h3>
                <p class="text-xs text-slate-400">ID: #<?= $f['id_fasilitas'] ?></p>

                <div class="mt-6 pt-4 border-t border-slate-100 flex justify-end gap-2">
                    <a href="/admin/Fasilitas/edit/<?= htmlspecialchars($f['id_fasilitas']) ?>" class="text-sm font-medium text-slate-500 hover:text-amber-600 flex items-center gap-1 transition-colors px-2 py-1 rounded hover:bg-amber-50">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="/admin/Fasilitas/delete/<?= htmlspecialchars($f['id_fasilitas']) ?>" onclick="return confirm('Hapus data ini?')" class="text-sm font-medium text-slate-500 hover:text-red-600 flex items-center gap-1 transition-colors px-2 py-1 rounded hover:bg-red-50">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php if(empty($fasilitas)): ?>
    <div class="text-center py-12">
        <p class="text-slate-500">Belum ada fasilitas terdaftar.</p>
    </div>
<?php endif; ?>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>