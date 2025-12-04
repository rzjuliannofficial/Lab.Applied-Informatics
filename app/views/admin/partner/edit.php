<?php ob_start(); ?>

<div class="max-w-5xl mx-auto">
    <!-- Header & Back Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-edit mr-2 text-yellow-600"></i> Edit Partner
        </h1>
        <a href="/admin/Produk" class="text-gray-500 hover:text-gray-700 transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>
<div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
    <form action="/admin/Partner/update/<?= $partners['id'] ?>" method="POST" enctype="multipart/form-data">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">

            <!-- KOLOM KIRI: Informasi Partner -->
            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    <i class="fas fa-handshake mr-2 text-gray-400"></i> Informasi Partner
                </h3>

                <!-- Nama Partner -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nama
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama" required
                           value="<?= htmlspecialchars($partners['nama']) ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                           placeholder="Nama Partner">
                </div>

                <!-- Website -->
                <div class="relative">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Website
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                    style="padding-top: 23px;">
                        <i class="fas fa-globe text-gray-400"></i>
                    </div>
                    <input type="url" name="website"
                           value="<?= htmlspecialchars($partners['website']) ?>"
                           class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg"
                           placeholder="https://contoh-website.com">
                </div>

                <!-- Kategori Partner -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Kategori Partner
                        <span class="text-red-500">*</span>
                    </label>
                    <select name="kategori" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition">
                        <option value="Industry Partner" <?= $partners['kategori']=='Industry Partner'?'selected':'' ?>>Industry Partner</option>
                        <option value="Educational Institutions" <?= $partners['kategori']=='Educational Institutions'?'selected':'' ?>>Educational Institutions</option>
                        <option value="International Institutions" <?= $partners['kategori']=='International Institutions'?'selected':'' ?>>International Institutions</option>
                        <option value="Government Institutions" <?= $partners['kategori']=='Government Institutions'?'selected':'' ?>>Government Institutions</option>
                    </select>
                </div>
            </div>

            <!-- KOLOM KANAN: Logo & Deskripsi -->
            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    <i class="fas fa-info-circle mr-2 text-gray-400"></i> Detail Partner
                </h3>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Deskripsi
                        <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi" rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                              placeholder="Deskripsi singkat tentang partner..."><?= htmlspecialchars($partners['deskripsi']) ?></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Logo Partner
                        <span class="text-red-500">*</span>
                    </label>
                                
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <?php if (!empty($partners['logo'])): ?>
                                <img src="<?= htmlspecialchars($partners['logo']) ?>" class="h-16 w-16 rounded-full object-cover border border-gray-200">
                            <?php else: ?>
                                <span class="inline-block h-16 w-16 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center border border-gray-200">
                                    <i class="fas fa-image text-4xl text-gray-400"></i>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="w-full">
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:bg-gray-50 transition cursor-pointer relative">
                                <div class="space-y-1 text-center">
                                    <div class="flex text-sm text-gray-600 justify-center">
                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-yellow-600 hover:text-yellow-500 focus-within:outline-none">
                                            <span>Ganti Foto</span>
                                            <input id="file-upload" name="logo" type="file" class="sr-only">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500">Kosongkan jika tidak ingin mengubah</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- FOOTER -->
        <div class="bg-gray-50 px-8 py-5 border-t border-gray-200 flex justify-end space-x-3">
            <a href="/admin/Partner"
               class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-100 transition">
                Batal
            </a>
            <button type="submit"
                    class="px-6 py-2 rounded-lg bg-yellow-600 text-white font-bold shadow-md 
                           hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition">
                <i class="fas fa-save mr-2"></i> Update Partner
            </button>
        </div>

    </form>
</div>

</div>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
