<?php ob_start(); ?>


<div class="max-w-5xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-edit mr-2 text-yellow-600"></i> Edit Aktivitas Dosen
        </h1>
        <a href="/admin/AktivitasDosen" class="text-gray-500 hover:text-gray-700 transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
    <form action="/admin/AktivitasDosen/update/<?= $aktivitas['id'] ?>" method="POST" enctype="multipart/form-data">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">

            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    <i class="fas fa-briefcase mr-2 text-gray-400"></i> Informasi Aktivitas
                </h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Dosen
                        <span class="text-red-500">*</span>
                    </label>
                    <select name="id_dosen"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white">
                        <?php foreach ($dosen as $d): ?>
                            <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                                <option value="<?= $d['id'] ?>"
                                    <?= $d['id'] == $aktivitas['id_dosen'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($d['nama']) ?>
                                </option>
                            <?php elseif ($_SESSION['user']['role'] === 'editor' && $_SESSION['user']['id_dosen'] == $d['id']): ?>
                                <option value="<?= $d['id'] ?>"><?= htmlspecialchars($d['nama']) ?></option>
                            <!-- Kondisi agar tampil sesuai namanya -->
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Judul Aktivitas
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="judul"
                        value="<?= htmlspecialchars($aktivitas['judul']) ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan judul aktivitas...">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Jenis Aktivitas
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="jenis_aktivitas"
                        value="<?= htmlspecialchars($aktivitas['jenis_aktivitas']) ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Contoh: Seminar, Workshop, Pelatihan...">
                </div>
            </div>

            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    <i class="fas fa-calendar-alt mr-2 text-gray-400"></i> Detail Aktivitas
                </h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Tanggal
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="tanggal"
                        value="<?= htmlspecialchars($aktivitas['tanggal']) ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Deskripsi
                        <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Tuliskan deskripsi aktivitas..."><?= htmlspecialchars($aktivitas['deskripsi']) ?></textarea>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Foto/Dokumentasi
                        <span class="text-red-500">*</span>
                    </label>                    
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <?php if (!empty($aktivitas['foto_url'])): ?>
                                <img src="<?= htmlspecialchars($aktivitas['foto_url']) ?>" class="h-16 w-16 rounded-full object-cover border border-gray-200">
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
                                            <input id="file-upload" name="foto_url" type="file" class="sr-only">
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

        <div class="bg-gray-50 px-8 py-5 border-t border-gray-200 flex items-center justify-end space-x-3">
            <a href="/admin/AktivitasDosen"
                class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-100 transition">
                Batal
            </a>

            <button type="submit"
                class="px-6 py-2 rounded-lg bg-yellow-600 text-white font-bold shadow-md hover:bg-yellow-700 transition">
                <i class="fas fa-save mr-2"></i> Update Aktivitas
            </button>
        </div>

    </form>
</div>

</div>
<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
