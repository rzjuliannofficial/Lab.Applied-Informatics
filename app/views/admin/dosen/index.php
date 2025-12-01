<?php ob_start(); ?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Daftar Member</h1>
    
    <!-- Other menus khusus admin -->
    <?php if ($_SESSION['user']['role'] === 'admin'): ?>
        <a href="/admin/dosen/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-1"></i> Tambah Member
        </a>
    <?php endif; ?>
</div>

<!-- Grid Layout -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($dosen as $d): ?>
        <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden flex flex-col">
            
            <!-- Card Body -->
            <div class="p-6 flex-1">
                <div class="flex items-start space-x-4">
                    <!-- Foto -->
                    <div class="flex-shrink-0">
                        <?php if (!empty($d['foto_profil'])): ?>
                            <img src="<?= htmlspecialchars($d['foto_profil']) ?>" class="w-16 h-16 rounded-full object-cover border">
                        <?php else: ?>
                            <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center text-xs text-gray-500 border">No Foto</div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Info Utama -->
                    <div class="flex-1 min-w-0">
                        <h3 class="text-lg font-bold text-gray-900 truncate"><?= htmlspecialchars($d['nama']) ?></h3>
                        <p class="text-sm text-gray-500 mb-1"><?= htmlspecialchars($d['nip']) ?></p>
                        <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full">
                            <?= htmlspecialchars($d['jabatan']) ?>
                        </span>
                    </div>
                </div>

                <div class="mt-4 space-y-2 text-sm text-gray-600">
                    <p><i class="fas fa-envelope w-5 text-center"></i> <?= htmlspecialchars($d['email']) ?></p>
                    <p><i class="fas fa-book w-5 text-center"></i> <?= htmlspecialchars($d['keahlian_text']) ?></p>
                    <p class="text-xs text-gray-400 italic mt-2 line-clamp-2">
                        "<?= htmlspecialchars($d['deskripsi'] ?? '-') ?>"
                    </p>
                </div>

                <!-- Academic Links -->
                <div class="mt-4 flex flex-wrap gap-2">
                    <?php if(!empty($d['google_scholar'])): ?>
                        <a href="<?= $d['google_scholar'] ?>" target="_blank" class="text-xs bg-blue-50 text-blue-600 px-2 py-1 rounded border border-blue-200 hover:bg-blue-100">
                            <i class="fas fa-graduation-cap"></i> Scholar
                        </a>
                    <?php endif; ?>
                    
                    <?php if(!empty($d['orcid'])): ?>
                        <a href="<?= $d['orcid'] ?>" target="_blank" class="text-xs bg-green-50 text-green-600 px-2 py-1 rounded border border-green-200 hover:bg-green-100">
                            <i class="fab fa-orcid"></i> ORCID
                        </a>
                    <?php endif; ?>

                    <?php if(!empty($d['researcher'])): ?>
                        <a href="<?= $d['researcher'] ?>" target="_blank" class="text-xs bg-teal-50 text-teal-600 px-2 py-1 rounded border border-teal-200 hover:bg-teal-100">
                            <i class="fab fa-researchgate"></i> RG
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <!-- akan muncul di editor sesuai id loginnya -->
             <?php if ($_SESSION['user']['role'] === 'editor' && $_SESSION['user']['id_dosen'] == $d['id']): ?>
                <!-- Card Footer (Actions) -->
                <div class="bg-gray-50 px-6 py-3 border-t flex justify-end space-x-3">
                    <a href="/admin/dosen/edit/<?= $d['id'] ?>" class="text-sm text-yellow-600 hover:text-yellow-800 font-medium">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="/admin/dosen/delete/<?= $d['id'] ?>" onclick="return confirm('Hapus dosen ini?')" class="text-sm text-red-600 hover:text-red-800 font-medium">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                </div>
            <?php endif; ?>
            <!-- khusus admin bisa edit semua -->
             <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                <!-- Card Footer (Actions) -->
                <div class="bg-gray-50 px-6 py-3 border-t flex justify-end space-x-3">
                    <a href="/admin/dosen/edit/<?= $d['id'] ?>" class="text-sm text-yellow-600 hover:text-yellow-800 font-medium">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="/admin/dosen/delete/<?= $d['id'] ?>" onclick="return confirm('Hapus dosen ini?')" class="text-sm text-red-600 hover:text-red-800 font-medium">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                </div>
            <?php endif; ?>

        </div>
    <?php endforeach; ?>
</div>

<?php 
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>