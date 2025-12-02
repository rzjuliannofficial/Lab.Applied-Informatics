<?php ob_start(); ?>

<div class="max-w-5xl mx-auto">
    <!-- Header & Back Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-edit mr-2 text-yellow-600"></i> Edit Caption Galeri
        </h1>
        <a href="/admin/galeri" class="text-gray-500 hover:text-gray-700 transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

<?php
$fileUrl = $item['file_url'];
?>
<div class="bg-white rounded-xl shadow-lg border border-gray-100 max-w-3xl mx-auto p-6">

    <!-- Preview Gambar -->
    <?php if (!empty($fileUrl)): ?>
        <div class="mb-6">
            <p class="font-semibold mb-2 text-gray-700">Preview Gambar</p>
            <a href="<?= htmlspecialchars($fileUrl) ?>" target="_blank">
                <img src="<?= htmlspecialchars($fileUrl) ?>" class="w-48 h-48 object-cover rounded border">
            </a>
        </div>
    <?php endif; ?>

    <form action="/admin/galeri/update/<?= $item['id'] ?>" method="POST" class="space-y-6">

        <!-- Caption -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Caption</label>
            <textarea name="caption"
                      rows="3"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200"
                      placeholder="Tuliskan caption di sini"><?= htmlspecialchars($item['caption'] ?? '') ?></textarea>
        </div>

        <!-- Kategori -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
            <select name="kategori"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring focus:ring-blue-200"
                    required>
                <option value="Berita" <?= ($item['kategori'] == 'Berita') ? 'selected' : '' ?>>Berita</option>
                <option value="Publikasi Dosen" <?= ($item['kategori'] == 'Publikasi Dosen') ? 'selected' : '' ?>>Publikasi Dosen</option>
                <option value="Aktivitas Dosen" <?= ($item['kategori'] == 'Aktivitas Dosen') ? 'selected' : '' ?>>Aktivitas Dosen</option>
                <option value="PPM" <?= ($item['kategori'] == 'PPM') ? 'selected' : '' ?>>PPM</option>
                <option value="Riset" <?= ($item['kategori'] == 'Riset') ? 'selected' : '' ?>>Riset Dosen</option>
                <option value="HKI" <?= ($item['kategori'] == 'HKI') ? 'selected' : '' ?>>Kekayaan Intelektual (HKI)</option>
                <option value="Produk" <?= ($item['kategori'] == 'Produk') ? 'selected' : '' ?>>Produk</option>
                <option value="Fasilitas" <?= ($item['kategori'] == 'Fasilitas') ? 'selected' : '' ?>>Fasilitas</option>
            </select>
        </div>

        <!-- Footer Actions -->
        <div class="flex items-center space-x-3">
            <button type="submit" class="px-5 py-2 rounded-lg bg-yellow-600 text-white font-medium shadow hover:bg-yellow-700 transition">
                Simpan Caption
            </button>
            <a href="/admin/galeri" class="text-gray-600 text-sm hover:underline">Kembali</a>
        </div>

    </form>

</div>


<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
