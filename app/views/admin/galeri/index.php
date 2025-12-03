<?php ob_start(); ?>

<h1 class="text-2xl font-bold mb-6">Galeri</h1>

<p class="text-gray-600 mb-4 text-sm">
    Semua foto di sini berasal dari fitur lain (Berita, Produk, Fasilitas, Kegiatan, Publikasi Lab, dll)
    dan hanya admin yang bisa mengelolanya.
</p>

<table class="mt-4 w-full border bg-white shadow text-sm">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2 border">Preview</th>
            <th class="p-2 border">Caption</th>
            <th class="p-2 border">Kategori</th>
            <th class="p-2 border">Sumber</th>
            <th class="p-2 border">Uploader</th>
            <th class="p-2 border">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php if (empty($galeri)): ?>
        <tr>
            <td colspan="6" class="p-8 text-center text-gray-500">
                <i class="fas fa-images text-4xl mb-3 block text-gray-300"></i>
                <p class="text-lg font-semibold mb-2">No Gallery Items Yet</p>
                <p class="text-sm">Gallery items are automatically created when you upload images in:</p>
                <p class="text-sm mt-2"><strong>Berita, Produk, Fasilitas, Kegiatan Lab, Penelitian Lab, or Publikasi Lab</strong></p>
                <p class="text-xs text-gray-400 mt-3">Create content with images in those modules to populate the gallery.</p>
            </td>
        </tr>
        <?php else: ?>
        <?php foreach ($galeri as $g): ?>
        <?php
            // tentukan sumber
            $sumber = "-";
            if (!empty($g['id_berita'])) {
                $sumber = "Berita: " . htmlspecialchars($g['judul_berita'] ?? '');
            } elseif (!empty($g['id_produk'])) {
                $sumber = "Produk: " . htmlspecialchars($g['nama_produk'] ?? '');
            } elseif (!empty($g['id_fasilitas'])) {
                $sumber = "Fasilitas: " . htmlspecialchars($g['nama_fasilitas'] ?? '');
            } elseif (!empty($g['id_kegiatan_lab'])) {
                $sumber = "Kegiatan Lab: " . htmlspecialchars($g['judul_kegiatan'] ?? '');
            } elseif (!empty($g['id_penelitian'])) {
                $sumber = "Penelitian Lab: " . htmlspecialchars($g['judul_penelitian'] ?? '');
            } elseif (!empty($g['id_publikasi_lab'])) {
                $sumber = "Publikasi Lab: " . htmlspecialchars($g['judul_publikasi_lab'] ?? '');
            }

            $fileUrl = $g['file_url'];
        ?>
        <tr class="hover:bg-gray-50">
            <td class="p-2 border">
                <a href="<?= $fileUrl ?>" target="_blank">
                    <img src="<?= $fileUrl ?>" class="w-20 h-20 object-cover rounded">
                </a>
            </td>

            <td class="p-2 border align-top">
                <?= $g['caption'] ? htmlspecialchars($g['caption']) : '<span class="text-gray-400 italic">belum ada caption</span>' ?>
            </td>

            <td class="p-2 border align-top">
                <span class="inline-block px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded">
                    <?= htmlspecialchars($g['kategori'] ?? '-') ?>
                </span>
            </td>

            <td class="p-2 border align-top">
                <?= htmlspecialchars($sumber) ?>
            </td>

            <td class="p-2 border align-top">
                <?= htmlspecialchars($g['nama_uploader'] ?? '-') ?>
            </td>

            <td class="p-2 border align-top">
                <a href="/admin/galeri/edit/<?= $g['id'] ?>" class="text-yellow-600 mr-2">
                    <i class="fas fa-edit"></i> Edit Caption
                </a>

                <a href="/admin/galeri/delete/<?= $g['id'] ?>"
                   onclick="return confirm('Hapus item galeri ini? (file fisik tidak dihapus)')"
                   class="text-red-600">
                    <i class="fas fa-trash"></i> Hapus
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
