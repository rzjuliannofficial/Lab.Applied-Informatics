<!-- ================= SIDEBAR ================= -->
    <!-- Hapus border dan pastikan satu warna background -->
    <aside class="fixed inset-y-0 left-0 sidebar-bg w-64 transition-transform duration-500 transform -translate-x-full md:translate-x-0 z-40 shadow-xl flex flex-col">
        
        <!-- Logo Area (Tanpa Border) -->
        <div class="flex items-center justify-center h-20 shrink-0">
            <div class="flex items-center gap-3 text-white">
                <i class="fas fa-robot text-2xl text-blue-400"></i>
                <h1 class="text-xl font-bold tracking-wider">LAB AI <span class="text-blue-400 text-xs block font-normal">Polinema</span></h1>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="mt-2 px-4 space-y-2 flex-1 overflow-y-auto">
            <a href="dasboard.php" class="flex items-center px-4 py-3 bg-blue-600 text-white rounded-lg transition-colors shadow-lg shadow-blue-900/50">
                <i class="fas fa-tachometer-alt w-6"></i>
                <span class="font-medium">Dashboard</span>
            </a>
            
            <div class="pt-4 pb-2">
                <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Modul Konten</p>
            </div>

            <a href="kelolaAnggotaLab.php" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition-colors group">
                <i class="fas fa-users w-6 text-gray-400 group-hover:text-white"></i>
                <span>Lab Members</span>
            </a>
            <a href="artikel_berita.php" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition-colors group">
                <i class="fas fa-calendar-alt w-6 text-gray-400 group-hover:text-white"></i>
                <span>Research & Innovation</span>
            </a>
            <a href="artikel_berita.php" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition-colors group">
                <i class="fas fa-calendar-alt w-6 text-gray-400 group-hover:text-white"></i>
                <span>Activities</span>
            </a>
            <a href="#" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition-colors group">
                <i class="fas fa-calendar-alt w-6 text-gray-400 group-hover:text-white"></i>
                <span>Gallery</span>
            </a>

            <div class="pt-4 pb-2">
                <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Sistem</p>
            </div>

            <a href="kelolaUser.php" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition-colors group">
                <i class="fas fa-cog w-6 text-gray-400 group-hover:text-white"></i>
                <span>Kelola User</span>
            </a>
        </nav>

        <!-- User Profile Bottom (Tanpa Border) -->
        <div class="p-4 mb-2">
            <div class="flex items-center gap-3">
                <!-- Avatar -->
                <div class="relative">
                    <div class="w-10 h-10 rounded-full bg-orange-500 flex items-center justify-center text-white font-bold text-lg shadow-sm">
                        U
                    </div>
                    <!-- Titik hijau statis di avatar -->
                    <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 bg-green-500 rounded-full animate-pulse"></span>
                </div>
                
                <!-- User Info -->
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-white truncate">Unggul W.</p>
                    <p class="text-xs text-gray-400 truncate">(Admin)</p>
                </div>
                
                <!-- Logout Button -->
                <a href="Logout.php" class="text-gray-400 hover:text-red-400 transition-colors p-2 " title="Logout">
                    <i class="fas fa-sign-out-alt text-lg"></i>
                </a>
            </div>
        </div>
    </aside>
    <!-- ================= END SIDEBAR ================= -->