<?php ob_start(); ?>

<div class="max-w-5xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-user-plus mr-2 text-blue-600"></i> Tambah Kekayaan Intelektual
        </h1>
        <a href="/admin/KekayaanIntelektual" class="text-gray-500 hover:text-gray-700 transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>
<div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
    <form action="/admin/KekayaanIntelektual/store" method="POST" enctype="multipart/form-data">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">

            <!-- KOLOM KIRI: Informasi Dosen -->
            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    <i class="fas fa-user-tie mr-2 text-gray-400"></i> Informasi Dosen
                </h3>

                <!-- Dosen -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Dosen
                        <span class="text-red-500">*</span>
                    </label>
                    <select name="id_dosen" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white">
                        <?php foreach ($dosen as $d): ?>
                            <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                                <option value="<?= $d['id'] ?>"><?= htmlspecialchars($d['nama']) ?></option>
                            <!-- Kondisi agar tampil sesuai namanya -->
                            <?php elseif ($_SESSION['user']['role'] === 'editor' && $_SESSION['user']['id_dosen'] == $d['id']): ?>
                                <option value="<?= $d['id'] ?>"><?= htmlspecialchars($d['nama']) ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Tahun -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Tahun
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="tahun" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Contoh: 2024">
                </div>
            </div>

            <!-- KOLOM KANAN: Detail Permohonan -->
            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    <i class="fas fa-file-signature mr-2 text-gray-400"></i> Detail Permohonan
                </h3>

                <!-- Judul KI -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Judul KI
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="judul" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan judul KI">
                </div>

                <!-- No. Permohonan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        No. Permohonan
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="no_permohonan" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Nomor permohonan pencatatan / paten">
                </div>

                <!-- Foto / Dokumentasi HKI -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Foto/Dokumentasi</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed 
                                rounded-lg hover:bg-gray-50 transition cursor-pointer">
                        <div class="text-center">
                            <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500">
                                    <span>Pilih file</span>
                                    <input type="file" name="foto_bukti" class="sr-only">
                                </label>
                                <p class="pl-1">atau drag & drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, JPEG — max 2MB</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- FOOTER ACTION -->
        <div class="bg-gray-50 px-8 py-5 border-t border-gray-200 flex items-center justify-end space-x-3">
            <a href="/admin/KekayaanIntelektual" class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-100 transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2 rounded-lg bg-blue-600 text-white font-bold shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                <i class="fas fa-save mr-2"></i> Simpan Data
            </button>
        </div>

    </form>
</div>

</div>


<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>