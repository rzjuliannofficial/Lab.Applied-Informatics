<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Riset & Proyek | Lab AI Polinema</title>
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
        .project-tag { background-color: #38bdf8; color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex">
    
    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Konten Utama dan Header Atas -->
    <div class="flex-1 main-content">
        <!-- Header Atas (Topbar) -->
        <header class="bg-white shadow-md p-4 flex justify-between items-center fixed w-full md:w-[calc(100%-16rem)] z-30 top-0 left-0">
            <h1 class="text-xl font-semibold text-gray-800">Kelola Riset & Proyek</h1>
            <a href="#" class="flex items-center text-gray-700 hover:text-accent">
                <span class="hidden sm:inline">Logout</span>
                <i class="fas fa-sign-out-alt ml-2"></i>
            </a>
        </header>

        <!-- Area Konten Utama -->
        <main class="p-6 pt-20">

            <div class="page-header flex justify-between items-center mb-6">
                <div>
                    <h1 class="page-title">Daftar Proyek</h1>
                    <p class="page-subtitle">Publikasi riset, tugas akhir, dan inisiatif Lab AI.</p>
                </div>
                <button class="bg-primary text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-150 flex items-center">
                    <i class="fas fa-plus mr-2"></i> Tambah Proyek
                </button>
            </div>

            <!-- Tabel Daftar Proyek -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tags</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <img src="https://placehold.co/50x50/1e2937/ffffff?text=AI" alt="Image" class="w-12 h-12 object-cover rounded">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">AI-Powered Diagnostic Tool</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex flex-wrap gap-1">
                                        <span class="project-tag">AI</span>
                                        <span class="project-tag">Healthcare</span>
                                        <span class="project-tag">ML</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash-alt"></i> Hapus</button>
                                </td>
                            </tr>
                             <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <img src="https://placehold.co/50x50/1e2937/ffffff?text=VR" alt="Image" class="w-12 h-12 object-cover rounded">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Real-Time Visualization Platform</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex flex-wrap gap-1">
                                        <span class="project-tag">Big Data</span>
                                        <span class="project-tag">Visualization</span>
                                    </div>
                                </td>
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
</html>a