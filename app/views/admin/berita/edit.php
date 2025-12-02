<?php ob_start(); ?>

<div class="max-w-5xl mx-auto">
    <!-- Header & Back Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-edit mr-2 text-yellow-600"></i> Edit Berita
        </h1>
        <a href="/admin/Berita" class="text-gray-500 hover:text-gray-700 transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
    <form action="/admin/Berita/update/<?= $berita['id'] ?>" method="POST" enctype="multipart/form-data">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">

            <!-- KOLOM KIRI -->
            <div class="space-y-6">
                
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    <i class="fas fa-newspaper mr-2 text-gray-400"></i> Informasi Berita
                </h3>

                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul Berita</label>
                    <input type="text" name="judul"
                        value="<?= htmlspecialchars($berita['judul']) ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                        required>
                </div>

                <!-- Tanggal -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Publikasi</label>
                    <input type="date" name="tanggal"
                        value="<?= $berita['tanggal'] ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                        required>
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori Berita</label>
                    <input type="text" name="kategori"
                        value="<?= htmlspecialchars($berita['kategori']) ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Contoh: Blockchain, Economy" required>
                </div>

            </div>

            <!-- KOLOM KANAN -->
            <div class="space-y-6">

                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    <i class="fas fa-align-left mr-2 text-gray-400"></i> Konten & Media
                </h3>

                <!-- Isi Berita -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Isi Berita</label>
                    <textarea name="isi_berita" rows="6"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                        required><?= htmlspecialchars($berita['isi_berita']) ?></textarea>
                </div>

                <!-- Upload Gambar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Baru (Opsional)</label>

                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed 
                                rounded-lg hover:bg-gray-50 transition cursor-pointer">
                        <div class="text-center">
                            <i class="fas fa-upload text-4xl text-gray-400 mb-2"></i>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500">
                                    <span>Pilih file</span>
                                    <input type="file" name="gambar_utama" class="sr-only">
                                </label>
                                <p class="pl-1">atau drag & drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, JPEG — max 2MB</p>
                        </div>
                    </div>

                    <!-- Preview Gambar Saat Ini -->
                    <?php if ($berita['gambar_utama']): ?>
                        <p class="text-sm font-semibold text-gray-700 mt-3 mb-1">Gambar Saat Ini:</p>
                        <img src="<?= htmlspecialchars($berita['gambar_utama']) ?>"
                             class="w-32 h-32 object-cover rounded-lg shadow">
                    <?php endif; ?>
                </div>

            </div>
        </div>

        <!-- FOOTER ACTION -->
        <div class="bg-gray-50 px-8 py-5 border-t border-gray-200 flex items-center justify-end space-x-3">
            <a href="/admin/Berita" 
               class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-100 transition">
                Batal
            </a>

            <button type="submit"
                class="px-6 py-2 rounded-lg bg-yellow-600 text-white font-bold shadow-md hover:bg-yellow-700 
                       focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition">
                <i class="fas fa-save mr-2"></i> Update Berita
            </button>
        </div>

    </form>
</div>

</div>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
