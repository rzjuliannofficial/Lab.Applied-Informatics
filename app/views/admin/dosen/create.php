<?php ob_start(); ?>

<div class="max-w-5xl mx-auto">
    <!-- Header & Back Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-user-plus mr-2 text-blue-600"></i> Tambah Member Baru
        </h1>
        <a href="/admin/dosen" class="text-gray-500 hover:text-gray-700 transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
        <form action="/admin/dosen/store" method="POST" enctype="multipart/form-data">
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">
                
                <!-- KOLOM KIRI: Identitas Utama -->
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                        <i class="fas fa-id-card mr-2 text-gray-400"></i> Informasi Pribadi
                    </h3>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" required class="w-full px-4 py-2 border border-gray-300 rounded-lg " placeholder="Contoh: Dr. Budi Santoso, M.T.">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">NIP / NIM</label>
                            <input type="text" name="nip" required class="w-full px-4 py-2 border border-gray-300 rounded-lg ">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                            <select name="jabatan" class="w-full px-4 py-2 border border-gray-300 rounded-lg  bg-white">
                                <option value="member">Member</option>
                                <option value="asisten_lab">Asisten Lab</option>
                                <option value="ketua_lab">Ketua Lab</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Institusi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" name="email" required class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg " placeholder="nama@kampus.ac.id">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Foto Profil</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:bg-gray-50 transition cursor-pointer relative">
                            <div class="space-y-1 text-center">
                                <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                        <span>Upload file</span>
                                        <input id="file-upload" name="foto" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">atau drag & drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
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
                        <input type="text" name="keahlian_text" required class="w-full px-4 py-2 border border-gray-300 rounded-lg " placeholder="Contoh: AI, Data Science, Networking">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
                        <textarea name="deskripsi" rows="3" required class="w-full px-4 py-2 border border-gray-300 rounded-lg " placeholder="Tuliskan bio singkat..."></textarea>
                    </div>

                    <!-- SOCIAL LINKS SECTION -->
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 space-y-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tautan Publikasi</label>
                        
                        <!-- Google Scholar -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-graduation-cap text-blue-600"></i>
                            </div>
                            <input type="url" name="link_scholar" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-md  text-sm" placeholder="URL Google Scholar">
                        </div>

                        <!-- ORCID -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fab fa-orcid text-green-600"></i>
                            </div>
                            <input type="url" name="link_orcid" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-md text-sm" placeholder="URL ORCID">
                        </div>

                        <!-- ResearchGate -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fab fa-researchgate text-teal-600"></i>
                            </div>
                            <input type="url" name="link_researchgate" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-md text-sm" placeholder="URL ResearchGate">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer Action -->
            <div class="bg-gray-50 px-8 py-5 border-t border-gray-200 flex items-center justify-end space-x-3">
                <a href="/admin/dosen" class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-100 transition">
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