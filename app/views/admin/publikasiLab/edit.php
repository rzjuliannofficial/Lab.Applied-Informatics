<?php ob_start(); ?>

<div class="max-w-5xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-edit mr-2 text-yellow-600"></i> Edit Publikasi Lab
        </h1>
        <a href="/admin/AktivitasDosen" class="text-gray-500 hover:text-gray-700 transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>
<div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
    <form action="/admin/PublikasiLab/update/<?= $publikasi['id'] ?>" 
          method="POST" enctype="multipart/form-data">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">

            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    <i class="fas fa-flask mr-2 text-gray-400"></i> Informasi Publikasi Lab
                </h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Dosen</label>
                    <select name="id_dosen" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white">
                        <?php foreach ($dosen as $d): ?>
                            <option value="<?= $d['id'] ?>" 
                                <?= $d['id'] == $publikasi['id_dosen'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($d['nama']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                    <input type="text" name="judul" 
                           value="<?= htmlspecialchars($publikasi['judul']) ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg" 
                           placeholder="Masukkan judul publikasi">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <input type="text" name="kategori" 
                           value="<?= htmlspecialchars($publikasi['kategori']) ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg" 
                           placeholder="Contoh: Penelitian, Kegiatan Lab">
                </div>
            </div>

            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    <i class="fas fa-file-alt mr-2 text-gray-400"></i> Detail Publikasi
                </h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg"><?= htmlspecialchars($publikasi['deskripsi']) ?></textarea>
                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload Dokumen Baru (opsional)</label>

                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:bg-gray-50 transition cursor-pointer">
                        <div class="space-y-1 text-center">
                            <i class="fas fa-file-upload text-4xl text-gray-400"></i>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label for="file-upload" 
                                       class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500">
                                    <span>Pilih file</span>
                                    <input id="file-upload" name="file_dokumen" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">atau drag & drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PDF, DOC, ZIP — max 10MB</p>
                        </div>
                    </div>

                    <?php if (!empty($publikasi['file_dokumen'])): ?>
                        <div class="mt-3 p-3 bg-gray-50 border rounded-lg">
                            <p class="text-sm font-semibold text-gray-700 mb-1">Dokumen Saat Ini:</p>
                            <a href="/uploads/publikasi_lab/<?= $publikasi['file_dokumen'] ?>" 
                               target="_blank" 
                               class="text-blue-600 underline text-sm flex items-center">
                                <i class="fas fa-file mr-2"></i> Lihat Dokumen
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>

        <div class="bg-gray-50 px-8 py-5 border-t border-gray-200 flex items-center justify-end space-x-3">
            <a href="/admin/PublikasiLab" 
               class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-100 transition">
                Batal
            </a>
            <button type="submit" 
                    class="px-6 py-2 rounded-lg bg-yellow-600 text-white font-bold shadow-md hover:bg-yellow-700 transition">
                <i class="fas fa-save mr-2"></i> Update Data
            </button>
        </div>

    </form>
</div>

</div>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
