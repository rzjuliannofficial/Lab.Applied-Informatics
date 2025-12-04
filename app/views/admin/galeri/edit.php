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
<div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">

    <div class="p-8">

        <!-- GRID 2 KOLOM RASIO 2:3 -->
        <div class="grid grid-cols-1 md:grid-cols-[2fr_3fr] gap-8">

            <!-- PREVIEW GAMBAR -->
            <?php if (!empty($fileUrl)): ?>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-3 flex items-center">
                        <i class="fas fa-image text-gray-400 mr-2"></i> Preview Gambar
                    </h3>

                    <a href="<?= htmlspecialchars($fileUrl) ?>" target="_blank" class="block w-max">
                        <img src="<?= htmlspecialchars($fileUrl) ?>"    
                             class="w-56 h-56 object-cover rounded-lg border shadow-sm hover:opacity-90 transition">
                    </a>
                </div>
            <?php endif; ?>

            <!-- FORM EDIT CAPTION -->
            <div>
                <form id="form" action="/admin/galeri/update/<?= $item['id'] ?>" method="POST" class="space-y-6">

                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-pen text-gray-400 mr-2"></i> Caption 
                            <span class="text-red-500">*</span>
                        </h3>

                        <textarea 
                            name="caption"
                            rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200"
                            placeholder="Tuliskan caption di sini"
                        ><?= htmlspecialchars($item['caption'] ?? '') ?></textarea>
                    </div>

                </form>
            </div>

        </div>

    </div>

    <!-- FOOTER ACTIONS -->
    <div class="bg-gray-50 px-8 py-5 border-t border-gray-200 flex items-center justify-end space-x-3">
        <a href="/admin/galeri"
           class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-100 transition">
            Kembali
        </a>

        <button form="form" type="submit"
            class="px-6 py-2 rounded-lg bg-yellow-600 text-white font-bold shadow-md hover:bg-yellow-700 transition">
            <i class="fas fa-save mr-2"></i> Simpan Caption
        </button>
    </div>

</div>


</div>


<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
