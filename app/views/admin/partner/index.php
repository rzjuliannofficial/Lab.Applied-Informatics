<?php ob_start(); ?>

<h1 class="text-2xl font-bold mb-6">Partner</h1>

<a href="/admin/partner/create" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Partner</a>

<table class="mt-4 w-full border bg-white shadow">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2 border">Nama</th>
            <th class="p-2 border">Logo</th>
            <th class="p-2 border">Kategori</th>
            <th class="p-2 border">Website</th>
            <th class="p-2 border">Deskripsi</th>
            <th class="p-2 border">Aksi</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($partners as $partner): ?>
        <tr class="hover:bg-gray-50">
            <td class="p-2 border"><?= htmlspecialchars($partner['nama']) ?></td>
            <td class="p-2 border">
                <?php if ($partner['logo']): ?>
                    <img src="<?= htmlspecialchars($partner['logo']) ?>" class="w-16 h-16 object-cover rounded">
                <?php else: ?>
                    <span class="text-gray-400">-</span>
                <?php endif; ?>
            </td>
            <td class="p-2 border"><?= htmlspecialchars($partner['kategori']) ?></td>
            <td class="p-2 border"><?= htmlspecialchars($partner['website']) ?></td>
            <td class="p-2 border"><?= htmlspecialchars($partner['deskripsi']) ?></td>


            <td class="p-2 border">
                <a href="/admin/partner/edit/<?= $partner['id'] ?>" class="text-yellow-600 mr-2">
                    <i class="fas fa-edit"></i> Edit
                </a>

                <a href="/admin/partner/delete/<?= $partner['id'] ?>" 
                   onclick="return confirm('Hapus partner ini?')"
                   class="text-red-600">
                    <i class="fas fa-trash"></i> Hapus
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>

</table>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
