<?php ob_start(); ?>

<h1 class="text-2xl font-bold mb-6">Edit Caption Galeri</h1>

<?php
$fileUrl = $item['file_url'];
?>

<div class="bg-white p-6 rounded-lg shadow w-full max-w-3xl">

    <div class="mb-4">
        <p class="font-semibold mb-2">Preview Gambar</p>
        <a href="<?= htmlspecialchars($fileUrl) ?>" target="_blank">
            <img src="<?= htmlspecialchars($fileUrl) ?>" class="w-48 h-48 object-cover rounded border">
        </a>
    </div>

    <form action="/admin/galeri/update/<?= $item['id'] ?>" method="POST">

        <label class="block font-semibold mb-1">Caption</label>
        <textarea name="caption"
                  class="w-full p-2 border rounded mb-4"
                  rows="3"><?= htmlspecialchars($item['caption'] ?? '') ?>
        </textarea>
        
        <label class="block font-semibold mb-1">Kategori</label>
        <select name="kategori" class="w-full p-2 border rounded mb-4" required>
            <option value="Berita" <?= ($item['kategori'] == 'Berita') ? 'selected' : '' ?>>Berita</option>
            <option value="Publikasi Lab" <?= ($item['kategori'] == 'Publikasi Lab') ? 'selected' : '' ?>>Publikasi Lab</option>
            <option value="Produk" <?= ($item['kategori'] == 'Produk') ? 'selected' : '' ?>>Produk</option>
            <option value="Fasilitas" <?= ($item['kategori'] == 'Fasilitas') ? 'selected' : '' ?>>Fasilitas</option>
            <option value="Penelitian Lab" <?= ($item['kategori'] == 'Penelitian Lab') ? 'selected' : '' ?>>Penelitian Lab</option>
            <option value="Kegiatan Lab" <?= ($item['kategori'] == 'Kegiatan Lab') ? 'selected' : '' ?>>Kegiatan Lab</option>
        </select>
        
        <button class="bg-yellow-600 text-white px-4 py-2 rounded">
            Simpan Caption
        </button>

        <a href="/admin/galeri" class="ml-2 text-gray-600 text-sm">Kembali</a>
    </form>

</div>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
