<?php ob_start(); ?>

<div class="max-w-5xl mx-auto">
    <!-- Header & Back Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-edit mr-2 text-yellow-600"></i> Edit Fasilitas
        </h1>
        <a href="/admin/Fasilitas" class="text-gray-500 hover:text-gray-700 transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>
<div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
    <form action="/admin/Fasilitas/update/<?= $fasilitas['id_fasilitas'] ?>" 
          method="POST" enctype="multipart/form-data">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">

            <!-- KOLOM KIRI -->
            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    <i class="fas fa-tools mr-2 text-gray-400"></i> Informasi Fasilitas
                </h3>

                <!-- Nama Fasilitas -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Fasilitas</label>
                    <input 
                        type="text" 
                        name="nama_fasilitas"
                        value="<?= htmlspecialchars($fasilitas['nama_fasilitas']) ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                    >
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea 
                        name="deskripsi" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                    ><?= htmlspecialchars($fasilitas['deskripsi']) ?></textarea>
                </div>
            </div>

            <!-- KOLOM KANAN -->
            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    <i class="fas fa-clipboard-check mr-2 text-gray-400"></i> Kondisi & Foto
                </h3>

                <!-- Kondisi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kondisi Fasilitas</label>
                    <select 
                        name="kondisi"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white"
                    >
                        <option value="baik" <?= $fasilitas['kondisi']=='baik'?'selected':'' ?>>Baik</option>
                        <option value="rusak" <?= $fasilitas['kondisi']=='rusak'?'selected':'' ?>>Rusak</option>
                        <option value="perbaikan" <?= $fasilitas['kondisi']=='perbaikan'?'selected':'' ?>>Dalam Perbaikan</option>
                    </select>
                </div>

                <!-- Upload Foto Baru -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Foto Baru (Opsional)</label>

                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:bg-gray-50 transition cursor-pointer">
                        <div class="space-y-1 text-center">
                            <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label for="file-upload"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500">
                                    <span>Pilih file</span>
                                    <input id="file-upload" name="foto" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">atau drag & drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, JPEG — max 2MB</p>
                        </div>
                    </div>
                </div>

                <!-- Preview Foto Lama -->
                <?php if ($fasilitas['foto']): ?>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Foto Saat Ini</label>
                        <div class="border rounded-lg p-3 bg-gray-50 flex justify-center">
                            <img 
                                src="<?= htmlspecialchars($fasilitas['foto']) ?>" 
                                class="w-40 h-40 object-cover rounded shadow"
                            >
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>

        <!-- FOOTER -->
        <div class="bg-gray-50 px-8 py-5 border-t border-gray-200 flex items-center justify-end space-x-3">
            <a href="/admin/Fasilitas" 
               class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-100 transition">
                Batal
            </a>
            <button type="submit"
                class="px-6 py-2 rounded-lg bg-yellow-600 text-white font-bold shadow-md hover:bg-yellow-700 transition flex items-center">
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
