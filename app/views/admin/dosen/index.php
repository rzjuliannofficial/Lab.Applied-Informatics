<?php ob_start(); ?>

<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Manajemen Dosen</h1>
        <p class="text-slate-500 text-sm mt-1">Kelola data pengajar dan peneliti laboratorium.</p>
    </div>
    
    <?php if ($_SESSION['user']['role'] === 'admin'): ?>
        <a href="/admin/dosen/create" class=" relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-medium text-white transition-all duration-200 bg-gradient-to-r from-blue-600 to-blue-800 rounded-full hover:from-blue-700 hover:to-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50">
            <i class="fas fa-plus mr-2 "></i>
            Tambah Anggota
        </a>
    <?php endif; ?>
</div>

<div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 mb-8 flex flex-col sm:flex-row gap-4 justify-between items-center">
    <form action="" method="GET" class="relative w-full sm:w-96">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <button type="submit" class="focus:outline-none">
                <i class="fas fa-search text-slate-400 hover:text-blue-500 transition-colors"></i>
            </button>
        </span>
        <input type="text" 
               name="search" 
               value="<?= htmlspecialchars($data['keyword'] ?? '') ?>" 
               placeholder="Cari nama atau NIP..." 
               class="w-full py-2 pl-10 pr-4 text-sm text-slate-700 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-blue-500 transition-all placeholder-slate-400"
               onchange="this.form.submit()">
    </form>

    <div class="text-sm text-slate-500 font-medium">
        Total: <span class="text-blue-700 font-bold"><?= count($dosen) ?></span> Dosen
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
    <?php foreach ($dosen as $d): ?>
        <div class="group bg-white rounded-2xl border border-slate-100 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] hover:shadow-[0_8px_30px_-4px_rgba(0,0,0,0.1)] transition-all duration-300 hover:-translate-y-1 relative overflow-hidden">
            
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-cyan-400 transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>

            <div class="p-6">
                <div class="flex items-start gap-4">
                    <div class="relative">
                        <div class="w-16 h-16 rounded-2xl overflow-hidden border-2 border-white shadow-md">
                            <?php if (!empty($d['foto_profil'])): ?>
                                <img src="<?= htmlspecialchars($d['foto_profil']) ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500 object-top">
                            <?php else: ?>
                                <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400">
                                    <i class="fas fa-user text-xl"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <span class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></span>
                    </div>

                    <div class="flex-1 min-w-0 pt-1">
                        <h3 class="text-lg font-bold text-slate-800 truncate group-hover:text-blue-700 transition-colors">
                            <?= htmlspecialchars($d['nama']) ?>
                        </h3>
                        <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">
                            <?= htmlspecialchars($d['nip']) ?>
                        </p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100 capitalize">
                            <?= htmlspecialchars($d['jabatan']) ?>
                        </span>
                    </div>
                </div>

                <div class="h-px bg-slate-100 my-4 group-hover:bg-slate-200 transition-colors"></div>

                <div class="space-y-3">
                    <div class="flex items-center text-sm text-slate-600">
                        <div class="w-8 flex justify-center text-blue-500/70"><i class="fas fa-envelope"></i></div>
                        <span class="truncate"><?= htmlspecialchars($d['email']) ?></span>
                    </div>
                    <div class="flex items-center text-sm text-slate-600">
                        <div class="w-8 flex justify-center text-purple-500/70"><i class="fas fa-layer-group"></i></div>
                        <span class="truncate"><?= htmlspecialchars($d['keahlian_text'] ?? '-') ?></span>
                    </div>
                </div>

                <div class="mt-5 flex gap-2">
                    <?php 
                        $links = [
                            ['url' => $d['google_scholar'], 'icon' => 'fas fa-graduation-cap', 'bg' => 'hover:bg-blue-600', 'text' => 'Scholar'],
                            ['url' => $d['orcid'], 'icon' => 'fab fa-orcid', 'bg' => 'hover:bg-green-600', 'text' => 'Orcid'],
                            ['url' => $d['researcher'], 'icon' => 'fab fa-researchgate', 'bg' => 'hover:bg-teal-600', 'text' => 'RG']
                        ];
                    ?>
                    <?php foreach($links as $link): ?>
                        <?php if(!empty($link['url'])): ?>
                            <a href="<?= $link['url'] ?>" target="_blank" class="flex-1 py-1.5 text-center text-xs font-medium text-slate-600 bg-slate-50 rounded-lg hover:text-white <?= $link['bg'] ?> transition-colors border border-slate-200 hover:border-transparent" title="<?= $link['text'] ?>">
                                <i class="<?= $link['icon'] ?>"></i>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if ($_SESSION['user']['role'] === 'admin' || ($_SESSION['user']['role'] === 'editor' && $_SESSION['user']['id_dosen'] == $d['id'])): ?>
                <div class="bg-slate-50/50 px-6 py-3 border-t border-slate-100 flex justify-between items-center group-hover:bg-blue-50/30 transition-colors">
                    <span class="text-[10px] text-slate-400 font-medium">ACTION</span>
                    <div class="flex space-x-2">
                        <a href="/admin/dosen/edit/<?= $d['id'] ?>" class="p-2 text-slate-500 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/admin/dosen/delete/<?= $d['id'] ?>" onclick="return confirm('Hapus permanen?')" class="p-2 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" title="Delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

<?php if (empty($dosen)): ?>
    <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-slate-300">
        <div class="bg-blue-50 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-blue-500">
            <i class="fas fa-users text-2xl"></i>
        </div>
        <h3 class="text-lg font-bold text-slate-800">Belum ada data dosen</h3>
        <p class="text-slate-500 mb-6">Silakan tambahkan data dosen baru.</p>
        <a href="/admin/dosen/create" class="text-blue-600 font-medium hover:underline">Tambah Data Sekarang</a>
    </div>
<?php endif; ?>

<?php 
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>