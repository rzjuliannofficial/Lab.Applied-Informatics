<?php ob_start(); ?>

<h1 class="text-2xl font-bold mb-6">Pesan Kontak</h1>

<table class="mt-4 w-full border bg-white shadow">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2 border">#</th>
            <th class="p-2 border">Nama</th>
            <th class="p-2 border">Email</th>
            <th class="p-2 border">Subject</th>
            <th class="p-2 border">Isi Pesan</th>
            <th class="p-2 border">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $i = 0; foreach ($pesan as $p): ?>
        <tr class="hover:bg-gray-50">
            <td class="p-2 border"><?= ++$i ?></td>

            <td class="p-2 border">
                <?= htmlspecialchars($p['nama']) ?>
            </td>

            <td class="p-2 border">
                <?= htmlspecialchars($p['email']) ?>
            </td>

            <td class="p-2 border">
                <?= htmlspecialchars($p['subject']) ?>
            </td>

            <td class="p-2 border">
                <!-- <div class="max-w-xs truncate text-gray-700"> -->
                    <?= htmlspecialchars($p['isi']) ?>
                <!-- </div> -->
            </td>

            <td class="p-2 border">
                <div class="flex items-center justify-center gap-2">

                    <a href="/admin/kontak/delete/<?= $p['id'] ?>"
                       onclick="return confirm('Hapus pesan ini?')"
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
