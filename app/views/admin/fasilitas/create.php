<?php ob_start(); ?>
<div class="max-w-5xl mx-auto">
    <!-- Header & Back Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-user-plus mr-2 text-blue-600"></i> Tambah Fasilitas
        </h1>
        <a href="/admin/Fasilitas" class="text-gray-500 hover:text-gray-700 transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>
<div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
    <form action="/admin/Fasilitas/store" method="POST" enctype="multipart/form-data">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">

            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    <i class="fas fa-tools mr-2 text-gray-400"></i> Informasi Fasilitas
                </h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Fasilitas
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_fasilitas"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Contoh: Komputer Lab, Proyektor, Meja Kerja">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Deskripsi
                        <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Tuliskan detail fasilitas..."></textarea>
                </div>
            </div>

            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    <i class="fas fa-clipboard-check mr-2 text-gray-400"></i> Kondisi & Foto
                </h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Kondisi Fasilitas
                        <span class="text-red-500">*</span>
                    </label>
                    <select name="kondisi"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white">
                        <option value="baik">Baik</option>
                        <option value="rusak">Rusak</option>
                        <option value="perbaikan">Dalam Perbaikan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Foto Fasilitas
                        <span class="text-red-500">*</span>
                    </label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:bg-gray-50 transition cursor-pointer">
                        <div class="space-y-1 text-center">
                            <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label for="file-upload"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500">
                                    <span>Upload file</span>
                                    <input id="file-upload" name="foto" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">atau drag & drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, JPEG — max 2MB</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="bg-gray-50 px-8 py-5 border-t border-gray-200 flex items-center justify-end space-x-3">
            <a href="/admin/Fasilitas"
                class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-100 transition">
                Batal
            </a>
            <button type="submit"
                class="px-6 py-2 rounded-lg bg-blue-600 text-white font-bold shadow-md hover:bg-blue-700 transition flex items-center">
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
