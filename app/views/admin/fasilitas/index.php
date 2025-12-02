<?php ob_start(); ?>

<h1 class="text-2xl font-bold mb-6">Fasilitas</h1>

<a href="/admin/Fasilitas/create" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Fasilitas</a>

<table class="mt-4 w-full border bg-white shadow">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2 border">#</th>
            <th class="p-2 border">Foto</th>
            <th class="p-2 border">Nama</th>
            <th class="p-2 border">Kondisi</th>
            <th class="p-2 border">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $i=0;
        foreach ($fasilitas as $f): ?>
        <tr class="hover:bg-gray-50">
            <td class="p-2 border"><?php echo ++$i; ?></td>
            <td class="p-2 border">
                <?php if ($f['foto']): ?>
                    <img src="<?= htmlspecialchars($f['foto']) ?>" class="w-16 h-16 rounded object-cover">
                <?php else: ?>
                    <span class="text-gray-400 text-sm">-</span>
                <?php endif; ?>
            </td>

            <td class="p-2 border"><?= htmlspecialchars($f['nama_fasilitas']) ?></td>
            <td class="p-2 border"><?= htmlspecialchars($f['kondisi']) ?></td>
            <td class="p-3 border">
                <div class="flex items-center justify-center gap-2">

                    <a href="/admin/Fasilitas/edit/<?= $r['id'] ?>" class="flex items-center gap-1 px-2 py-1 text-xs font-medium 
                  text-yellow-700 bg-yellow-100 border border-yellow-300 
                  rounded hover:bg-yellow-200 transition">
                        <i class="fas fa-edit text-[10px]"></i>
                        Edit
                    </a>

                    <a href="/admin/Fasilitas/delete/<?= $b['id'] ?>" onclick="return confirm('Hapus data ini?')"
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
