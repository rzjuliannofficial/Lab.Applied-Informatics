<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Anggota Lab | Lab AI Polinema</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --color-primary: #02416D;
            --color-accent: #F97316;
            --color-sidebar-bg: #1F2937;
        }
        .sidebar-bg { background-color: var(--color-sidebar-bg); }
        .bg-primary { background-color: var(--color-primary); }
        .text-accent { color: var(--color-accent); }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex">
    
    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Konten Utama dan Header Atas -->
    <div class="flex-1 md:ml-64">
        <!-- Header Atas (Topbar) -->
        <header class="bg-white shadow-md p-4 flex justify-between items-center fixed w-full md:w-[calc(100%-16rem)] z-30">
            <h1 class="text-xl font-semibold text-gray-800">Kelola Anggota Lab</h1>
            <a href="#" class="flex items-center text-gray-700 hover:text-accent">
                <span class="hidden sm:inline">Logout</span>
                <i class="fas fa-sign-out-alt ml-2"></i>
            </a>
        </header>

        <!-- Area Konten Utama -->
        <main class="p-6 pt-20">

            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <h2 class="text-2xl font-bold mb-4">Tambah Anggota Baru</h2>
                
                <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Kolom Kiri -->
                    <div class="space-y-4">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 border focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="nidn_nip" class="block text-sm font-medium text-gray-700">NIDN/NIP</label>
                            <input type="text" id="nidn_nip" name="nidn_nip" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 border focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email (Kontak)</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 border focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="space-y-4">
                        <div>
                            <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan/Status</label>
                            <select id="jabatan" name="jabatan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 border bg-white focus:border-blue-500 focus:ring-blue-500">
                                <option>Dosen Tetap</option>
                                <option>Asisten Lab</option>
                                <option>Mahasiswa (Peneliti)</option>
                            </select>
                        </div>
                        <div>
                            <label for="bidang" class="block text-sm font-medium text-gray-700">Bidang Keahlian</label>
                            <input type="text" id="bidang" name="bidang" placeholder="Contoh: Machine Learning, Computer Vision" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 border focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="foto" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                            <input type="file" id="foto" name="foto" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                    </div>
                    
                    <!-- Tombol Submit -->
                    <div class="md:col-span-2 flex justify-end pt-4">
                        <button type="submit" class="bg-primary text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-150">
                            <i class="fas fa-plus-circle mr-2"></i> Tambah Anggota
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabel Daftar Anggota -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Daftar Anggota Aktif</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIDN/NIP</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keahlian</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Contoh Data 1 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Dr. Ir. Budi Santoso, M.Kom.</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">197801012003011001</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Kepala Lab</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Neural Networks, Deep Learning</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash-alt"></i> Hapus</button>
                                </td>
                            </tr>
                            <!-- Contoh Data 2 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Rina Sari, S.Kom., M.T.</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">198510102012012005</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Dosen Tetap</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Natural Language Processing (NLP)</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash-alt"></i> Hapus</button>
                                </td>
                            </tr>
                            <!-- Tambahkan lebih banyak data di sini -->
                        </tbody>
                    </table>
                </div>
            </div>

        </main>

        <!-- Footer Admin -->
        <footer class="bg-gray-800 text-gray-400 p-3 text-center text-sm mt-6">
            &copy; 2025 AI Lab Polinema. Admin Panel v1.0.
        </footer>
    </div>
</body>
</html>