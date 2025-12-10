<?php ob_start(); ?>
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Daftar Berita</h1>
    <a href="/admin/Berita/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        <i class="fas fa-plus mr-1"></i> Tambah Data
    </a>
</div>
<table class="mt-4 w-full bg-white shadow rounded-lg overflow-hidden">
    <thead class="bg-gray-100 text-gray-700 text-sm font-semibold">
        <tr>
            <th class="p-3 border">#</th>
            <th class="p-3 border w-64">Judul</th>
            <th class="p-3 border w-96">Isi</th>
            <th class="p-3 border">Kategori</th>
            <th class="p-3 border">Tanggal</th>
            <th class="p-3 border">Gambar</th>
            <th class="p-3 border">Aksi</th>
        </tr>
    </thead>

    <tbody class="text-sm text-gray-800">
    <?php $i=0; foreach ($berita as $b): ?>
        <tr class="hover:bg-gray-50">
            
            <td class="p-3 border text-center">
                <?= ++$i ?>
            </td>

            <td class="p-3 border">
                <div class="font-medium text-gray-900 line-clamp-2">
                    <?= htmlspecialchars($b['judul']) ?>
                </div>
            </td>

            <td class="p-3 border">
                <div class="text-gray-600 line-clamp-2">
                    <?= htmlspecialchars($b['isi_berita']) ?>
                </div>
            </td>

            <td class="p-3 border text-center">
                <span class="px-2 py-1 bg-blue-50 text-blue-700 rounded text-xs">
                    <?= htmlspecialchars($b['kategori']) ?>
                </span>
            </td>

            <td class="p-3 border text-center text-gray-600">
                <?= htmlspecialchars($b['tanggal']) ?>
            </td>

            <td class="p-3 border text-center">
                <?php if ($b['gambar_utama']): ?>
                    <img src="<?= htmlspecialchars($b['gambar_utama']) ?>"
                         class="w-16 h-16 object-cover rounded border" />
                <?php else: ?>
                    <span class="text-gray-400 text-sm">Tidak ada</span>
                <?php endif; ?>
            </td>

            <td class="p-3 border">
    <div class="flex items-center justify-center gap-2">

        <a href="/admin/Berita/edit/<?= $b['id'] ?>"
           class="flex items-center gap-1 px-2 py-1 text-xs font-medium 
                  text-yellow-700 bg-yellow-100 border border-yellow-300 
                  rounded hover:bg-yellow-200 transition">
            <i class="fas fa-edit text-[10px]"></i>
            Edit
        </a>

        <a href="/admin/Berita/delete/<?= $b['id'] ?>"
           onclick="return confirm('Hapus berita ini?')"
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
