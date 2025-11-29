<?php ob_start(); ?>

<div class="max-w-5xl mx-auto">
    <!-- Header & Back Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-edit mr-2 text-yellow-600"></i> Edit Data Member
        </h1>
        <a href="/admin/dosen" class="text-gray-500 hover:text-gray-700 transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
        <form action="/admin/dosen/update/<?= $dosen['id'] ?>" method="POST" enctype="multipart/form-data">
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">
                
                <!-- KOLOM KIRI: Identitas Utama -->
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                        <i class="fas fa-id-card mr-2 text-gray-400"></i> Informasi Pribadi
                    </h3>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" required value="<?= htmlspecialchars($dosen['nama']) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">NIP / NIM</label>
                            <input type="text" name="nip" required value="<?= htmlspecialchars($dosen['nip']) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                            <select name="jabatan" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition bg-white">
                                <option value="member" <?= $dosen['jabatan']=='member'?'selected':'' ?>>Member</option>
                                <option value="asisten_lab" <?= $dosen['jabatan']=='asisten_lab'?'selected':'' ?>>Asisten Lab</option>
                                <option value="ketua_lab" <?= $dosen['jabatan']=='ketua_lab'?'selected':'' ?>>Ketua Lab</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Institusi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" name="email" required value="<?= htmlspecialchars($dosen['email']) ?>" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition">
                        </div>
                    </div>

                    <!-- Upload Foto -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
                        
                        <div class="flex items-center space-x-4">
                            <!-- Preview Foto Lama -->
                            <div class="flex-shrink-0">
                                <?php if (!empty($dosen['foto_profil'])): ?>
                                    <img src="/uploads/dosen/<?= htmlspecialchars($dosen['foto_profil']) ?>" class="h-16 w-16 rounded-full object-cover border border-gray-200">
                                <?php else: ?>
                                    <span class="inline-block h-16 w-16 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center border border-gray-200">
                                        <i class="fas fa-user text-gray-400 text-2xl"></i>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="w-full">
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:bg-gray-50 transition cursor-pointer relative">
                                    <div class="space-y-1 text-center">
                                        <div class="flex text-sm text-gray-600 justify-center">
                                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-yellow-600 hover:text-yellow-500 focus-within:outline-none">
                                                <span>Ganti Foto</span>
                                                <input id="file-upload" name="foto" type="file" class="sr-only">
                                            </label>
                                        </div>
                                        <p class="text-xs text-gray-500">Kosongkan jika tidak ingin mengubah</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KOLOM KANAN: Akademik & Link -->
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                        <i class="fas fa-graduation-cap mr-2 text-gray-400"></i> Profil Akademik
                    </h3>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Bidang Keahlian</label>
                        <input type="text" name="keahlian_text" required value="<?= htmlspecialchars($dosen['keahlian_text']) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
                        <textarea name="deskripsi" rows="3" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition"><?= htmlspecialchars($dosen['deskripsi']) ?></textarea>
                    </div>

                    <!-- SOCIAL LINKS SECTION -->
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 space-y-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tautan Publikasi</label>
                        
                        <!-- Google Scholar -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-graduation-cap text-blue-600"></i>
                            </div>
                            <input type="url" name="link_scholar" value="<?= htmlspecialchars($dosen['link_scholar'] ?? '') ?>" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" placeholder="URL Google Scholar">
                        </div>

                        <!-- ORCID -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fab fa-orcid text-green-600"></i>
                            </div>
                            <input type="url" name="link_orcid" value="<?= htmlspecialchars($dosen['link_orcid'] ?? '') ?>" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 text-sm" placeholder="URL ORCID">
                        </div>

                        <!-- ResearchGate -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fab fa-researchgate text-teal-600"></i>
                            </div>
                            <input type="url" name="link_researchgate" value="<?= htmlspecialchars($dosen['link_researchgate'] ?? '') ?>" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-500 focus:border-teal-500 text-sm" placeholder="URL ResearchGate">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer Action -->
            <div class="bg-gray-50 px-8 py-5 border-t border-gray-200 flex items-center justify-end space-x-3">
                <a href="/admin/dosen" class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-100 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 rounded-lg bg-yellow-600 text-white font-bold shadow-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition">
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