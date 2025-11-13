<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola User Akses | Lab AI Polinema</title>
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
            <h1 class="text-xl font-semibold text-gray-800">Kelola User Akses Dashboard</h1>
            <a href="#" class="flex items-center text-gray-700 hover:text-accent">
                <span class="hidden sm:inline">Logout</span>
                <i class="fas fa-sign-out-alt ml-2"></i>
            </a>
        </header>

        <!-- Area Konten Utama -->
        <main class="p-6 pt-20">

            <!-- Form Tambah User -->
            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <h2 class="text-2xl font-bold mb-4">Tambah User Baru</h2>
                
                <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Kolom Kiri -->
                    <div class="space-y-4">
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" id="username" name="username" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 border focus:border-blue-500 focus:ring-blue-500" placeholder="Username unik (tanpa spasi)">
                        </div>
                        <div>
                            <label for="email_user" class="block text-sm font-medium text-gray-700">Email User</label>
                            <input type="email" id="email_user" name="email_user" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 border focus:border-blue-500 focus:ring-blue-500" placeholder="Email aktif user">
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="space-y-4">
                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700">Hak Akses (Role)</label>
                            <select id="role" name="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 border bg-white focus:border-blue-500 focus:ring-blue-500">
                                <option value="editor">Editor (Hanya bisa menambah/mengubah konten)</option>
                                <option value="admin">Admin (Akses penuh: Kelola User & Approval)</option>
                            </select>
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password Awal</label>
                            <input type="password" id="password" name="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 border focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>
                    
                    <!-- Tombol Submit -->
                    <div class="md:col-span-2 flex justify-end pt-4">
                        <button type="submit" class="bg-red-600 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-red-700 transition duration-150">
                            <i class="fas fa-user-plus mr-2"></i> Buat Akun
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabel Daftar User -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Daftar User Aktif</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Contoh Data 1 (Admin) -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">UnggulW</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">unggul.w@labai.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        ADMIN
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-edit"></i> Ganti Role</button>
                                    <button class="text-gray-400 cursor-not-allowed" disabled><i class="fas fa-trash-alt"></i> Hapus</button>
                                </td>
                            </tr>
                            <!-- Contoh Data 2 (Editor) -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">RinaSari</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">rina.sari@labai.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        EDITOR
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-edit"></i> Ganti Role</button>
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