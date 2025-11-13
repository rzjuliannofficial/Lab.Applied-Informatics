<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Artikel / Berita | Lab AI Polinema</title>
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
        .admin-sidebar { width: 250px; background-color: var(--color-sidebar-bg); height: 100vh; position: fixed; top: 0; z-index: 40; color: #E5E7EB; }
        .main-content { margin-left: 250px; padding: 20px; width: calc(100% - 250px); }
        .page-title { color: #333; font-size: 24px; font-weight: 700; }
        .page-subtitle { color: #6B7280; font-size: 14px; }
        .btn-primary { background-color: var(--color-primary); }
        .tag-approved { background-color: #10B981; }
        .tag-pending { background-color: #FBBF24; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex">
    
    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Konten Utama dan Header Atas -->
    <div class="flex-1 main-content">
        <!-- Header Atas (Topbar) -->
        <header class="bg-white shadow-md p-4 flex justify-between items-center fixed w-full md:w-[calc(100%-16rem)] z-30 top-0 left-0">
            <h1 class="text-xl font-semibold text-gray-800">Kelola Artikel / Berita</h1>
            <a href="#" class="flex items-center text-gray-700 hover:text-accent">
                <span class="hidden sm:inline">Logout</span>
                <i class="fas fa-sign-out-alt ml-2"></i>
            </a>
        </header>

        <!-- Area Konten Utama -->
        <main class="p-6 pt-20">

            <div class="page-header flex justify-between items-center mb-6">
                <div>
                    <h1 class="page-title">Daftar Artikel</h1>
                    <p class="page-subtitle">Semua konten berita dan informasi Lab AI.</p>
                </div>
                <button class="bg-primary text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-150 flex items-center">
                    <i class="fas fa-plus mr-2"></i> Buat Artikel Baru
                </button>
            </div>

            <!-- Tabel Daftar Artikel -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Dibuat</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Lab AI Kembangkan Sistem Diagnosis Berbasis NLP</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rina Sari (Editor)</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="px-3 py-1 text-xs leading-5 font-semibold rounded-full text-white tag-approved">APPROVED</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12 Nov 2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash-alt"></i> Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Kunjungan Delegasi Okayama University</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Unggul W. (Admin)</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="px-3 py-1 text-xs leading-5 font-semibold rounded-full text-white tag-pending">PENDING</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">13 Nov 2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash-alt"></i> Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <!-- Footer Admin -->
        <footer class="bg-gray-800 text-gray-400 p-3 text-center text-sm mt-6 w-full">
            &copy; 2025 AI Lab Polinema. Admin Panel v1.0.
        </footer>
    </div>
    <script>
        document.querySelector('main').style.minHeight = 'calc(100vh - 80px - 40px)';
    </script>
</body>
</html>