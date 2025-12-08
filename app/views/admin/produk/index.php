<?php ob_start(); ?>
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Daftar Produk</h1>
    <a href="/admin/Produk/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        <i class="fas fa-plus mr-1"></i> Tambah Data
    </a>
</div>
<table class="mt-4 w-full border bg-white shadow">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2 border">#</th>
            <th class="p-2 border">Gambar</th>
            <th class="p-2 border">Nama Produk</th>
            <th class="p-2 border">Kategori</th>
            <th class="p-2 border">Aksi</th>
        </tr>
    </thead>

    <tbody>
    <?php $i=0;
    foreach ($produk as $p): ?>
        <tr class="hover:bg-gray-50">
            <td class="p-2 border"><?php echo ++$i; ?></td>
            <td class="p-2 border">
                <?php if ($p['image']): ?>
                    <img src="<?= htmlspecialchars($p['image']) ?>" class="w-16 h-16 rounded object-cover">
                <?php else: ?>
                    <span class="text-gray-400 text-sm">-</span>
                <?php endif; ?>
            </td>

            <td class="p-2 border"><?= htmlspecialchars($p['nama_produk']) ?></td>
            <td class="p-2 border"><?= htmlspecialchars($p['kategori']) ?></td>
            <td class="p-3 border">
                <div class="flex items-center justify-center gap-2">

                    <a href="/admin/Produk/edit/<?= $p['id'] ?>" class="flex items-center gap-1 px-2 py-1 text-xs font-medium 
                  text-yellow-700 bg-yellow-100 border border-yellow-300 
                  rounded hover:bg-yellow-200 transition">
                        <i class="fas fa-edit text-[10px]"></i>
                        Edit
                    </a>

                    <a href="/admin/Produk/delete/<?= $p['id'] ?>" onclick="return confirm('Hapus berita ini?')"
                        class="flex items-center gap-1 px-2 py-1 text-xs font-medium 
                  text-red-700 bg-red-100 border border-red-300 
                  rounded hover:bg-red-200 transition">
                        <i class="fas fa-trash text-[10px]"></i>
                        Hapus
                    </a>

                </div>
                
            </td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
