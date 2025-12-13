<?php ob_start(); ?>

<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Manajemen User</h1>
        <p class="text-slate-500 text-sm mt-1">Kelola akun administrator dan editor lab.</p>
    </div>
    
    <a href="/admin/user/create" class="group relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-medium text-white transition-all duration-200 bg-gradient-to-r from-blue-600 to-blue-800 rounded-full hover:from-blue-700 hover:to-blue-900 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50">
        <i class="fas fa-plus mr-2"></i> Tambah User
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    <?php $i = 0; while($row = pg_fetch_assoc($users)): ?>
        <div class="bg-white rounded-2xl border border-slate-100 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] hover:shadow-[0_8px_30px_-4px_rgba(0,0,0,0.1)] transition-all duration-300 hover:-translate-y-1 relative overflow-hidden group">
            
            <div class="absolute top-0 right-0 p-4 opacity-20 group-hover:opacity-40 transition-opacity">
                <?php if($row['role'] === 'admin'): ?>
                    <i class="fas fa-user-shield text-blue-700 text-6xl -mr-4 -mt-4 transform rotate-12"></i>
                <?php else: ?>
                    <i class="fas fa-user-pen text-sky-500 text-6xl -mr-4 -mt-4 transform rotate-12"></i>
                <?php endif; ?>
            </div>

            <div class="p-6 relative z-10">
                <div class="w-16 h-16 rounded-2xl mb-4 flex items-center justify-center text-xl font-bold text-white shadow-md
                    <?= $row['role'] === 'admin' 
                        ? 'bg-gradient-to-br from-blue-600 to-blue-800'  // Admin: Biru Gelap
                        : 'bg-gradient-to-br from-sky-400 to-cyan-500'   // Editor: Biru Terang
                    ?>">
                    <?= strtoupper(substr($row['username'], 0, 2)) ?>
                </div>

                <h3 class="text-lg font-bold text-slate-800 mb-1"><?= $row['username'] ?></h3>
                
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-bold border uppercase tracking-wider
                    <?= $row['role'] === 'admin' 
                        ? 'bg-blue-50 text-blue-700 border-blue-100' 
                        : 'bg-sky-50 text-sky-600 border-sky-100' ?>">
                    <?= ucfirst($row['role']) ?>
                </span>

                <div class="mt-6 pt-4 border-t border-slate-100 flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <a href="/admin/user/edit/<?= $row['id'] ?>" class="p-2 text-slate-400 hover:text-amber-500 hover:bg-amber-50 rounded-lg transition-colors" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="/admin/user/delete/<?= $row['id'] ?>" onclick="return confirm('Hapus user ini?')" class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php if (pg_num_rows($users) == 0): ?>
    <div class="text-center py-12 bg-slate-50 rounded-2xl border border-dashed border-slate-200">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 mb-4 text-blue-500">
            <i class="fas fa-users-slash text-2xl"></i>
        </div>
        <p class="text-slate-500 font-medium">Belum ada user terdaftar.</p>
    </div>
<?php endif; ?>

<?php 
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php"; 
?>