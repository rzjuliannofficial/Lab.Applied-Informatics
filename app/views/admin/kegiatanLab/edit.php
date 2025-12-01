<?php ob_start(); ?>

<div class="max-w-5xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-edit mr-2 text-yellow-600"></i> Edit Kegiatan Lab
        </h1>
        <a href="/admin/Kegiatan Lab" class="text-gray-500 hover:text-gray-700 transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>
<div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
    <form action="/admin/KegiatanLab/update/<?= $kegiatan['id'] ?>" method="POST" enctype="multipart/form-data">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">

            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    <i class="fas fa-tasks mr-2 text-gray-400"></i> Informasi Kegiatan
                </h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Dosen Penanggung Jawab</label>
                    <select name="id_dosen" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white">
                        <?php foreach ($dosen as $d): ?>
                            <option value="<?= $d['id'] ?>" <?= $kegiatan['id_dosen'] == $d['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($d['nama']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul Kegiatan</label>
                    <input type="text" name="judul"
                           value="<?= htmlspecialchars($kegiatan['judul']) ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                           placeholder="Masukkan judul kegiatan">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_kegiatan"
                           value="<?= htmlspecialchars($kegiatan['tanggal_kegiatan']) ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>
            </div>

            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    <i class="fas fa-info-circle mr-2 text-gray-400"></i> Detail & Dokumentasi
                </h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                              placeholder="Tuliskan deskripsi kegiatan..."><?= htmlspecialchars($kegiatan['deskripsi']) ?></textarea>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Upload Dokumentasi Baru</label>
                    <div class="flex items-center justify-center w-full">
                        <label class="flex flex-col w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:bg-gray-50 transition p-4">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-upload text-3xl text-gray-400 mb-2"></i>
                                <p class="text-sm text-gray-600">Klik untuk upload atau drag & drop</p>
                            </div>
                            <input type="file" name="file_dokumentasi" class="hidden">
                        </label>
                    </div>
                </div>

                <?php if (!empty($kegiatan['file_dokumentasi'])): ?>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">File Dokumentasi Saat Ini</label>

                        <a href="/uploads/kegiatan_lab/<?= $kegiatan['file_dokumentasi'] ?>"
                           target="_blank"
                           class="text-blue-600 underline text-sm">
                            <i class="fas fa-file-alt mr-1"></i> Lihat File
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        </div>

        <div class="bg-gray-50 px-8 py-5 border-t border-gray-200 flex items-center justify-end space-x-3">
            <a href="/admin/KegiatanLab"
               class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-100 transition">
                Batal
            </a>

            <button type="submit"
                    class="px-6 py-2 rounded-lg bg-yellow-600 text-white font-bold shadow-md hover:bg-yellow-700
                           focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition">
                <i class="fas fa-save mr-2"></i> Update Kegiatan
            </button>
        </div>

    </form>
</div>

</div>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
