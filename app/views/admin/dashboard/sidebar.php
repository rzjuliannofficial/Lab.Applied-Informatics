<aside class="w-64 fixed top-0 left-0 h-full shadow-2xl z-40 bg-[#1F2937] text-white">
    <div class="p-6">

        <!-- Logo Admin -->
        <div class="flex items-center space-x-3 mb-6">
            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center">
                <i class="fas fa-brain text-xl text-blue-800"></i>
            </div>
            <span class="text-xl font-bold text-white">AI Lab Admin</span>
        </div>

        <!-- User Box -->
        <div class="mb-8 p-3 bg-gray-700/50 rounded-lg">
            <div class="flex items-center space-x-3">
                <img src="https://placehold.co/40x40/f97316/ffffff?text=A" alt="User Avatar"
                    class="w-10 h-10 rounded-full object-cover">
                <div>
                    <p class="text-white font-semibold">
                        <?= $_SESSION['user']['username'] ?? 'Admin' ?>
                    </p>
                    <p class="text-xs text-green-400">
                        <i class="fas fa-circle text-xs mr-1"></i> Online
                    </p>
                </div>
            </div>
        </div>

        <!-- Navigasi -->
        <nav class="space-y-1">

            <a href="/admin/dashboard"
                class="flex items-center p-3 rounded-lg text-white font-semibold hover:bg-gray-700">
                <i class="fas fa-chart-line w-5 h-5 mr-3"></i>
                Dashboard
            </a>

            <p class="text-xs text-gray-400 uppercase pt-4 pb-1 px-3">Manajemen Data</p>

            <a href="/admin/dosen" class="flex items-center p-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-user-tie w-5 h-5 mr-3"></i>
                Dosen
            </a>

            <a href="/admin/publikasi" class="flex items-center p-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-book-open w-5 h-5 mr-3"></i>
                Publikasi
            </a>

            <a href="/admin/galeri" class="flex items-center p-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-images w-5 h-5 mr-3"></i>
                Galeri
            </a>

            <a href="/admin/produk" class="flex items-center p-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-shopping-cart w-5 h-5 mr-3"></i>
                Produk
            </a>

            <a href="/admin/fasilitas" class="flex items-center p-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-building w-5 h-5 mr-3"></i>
                Fasilitas
            </a>

            <!-- HANYA ADMIN YANG BOLEH -->
            <?php if ($_SESSION['user']['role'] === 'admin'): ?>

                <a href="/admin/user" class="flex items-center p-3 rounded-lg hover:bg-gray-700">
                    <i class="fas fa-user-shield w-5 mr-3"></i>
                    Kelola User
                </a>
            <?php endif; ?>
    
        </nav>

        <p class="text-xs text-gray-400 uppercase pt-4 pb-1 px-3">Sistem</p>

        <a href="/admin/logout"
            class="flex items-center p-3 rounded-lg text-red-400 hover:bg-gray-700 hover:text-red-300">
            <i class="fas fa-sign-out-alt w-5 h-5 mr-3"></i>
            Logout
        </a>

        </nav>

    </div>
</aside>