<!-- <aside class="w-64 fixed top-0 left-0 h-full shadow-2xl z-40 bg-[#1F2937] text-white"> -->
<aside class="fixed inset-y-0 left-0 sidebar-bg w-64 transition-transform duration-500 transform -translate-x-full md:translate-x-0 z-40 shadow-xl flex flex-col text-white">
    
        <div class="flex items-center gap-3 text-white px-6 py-4 border-b border-gray-700">
            <div class="w-10 h-10  flex items-center justify-center">
                <img src="/uploads/home/logoAi.png">
            </div>
            <h1 class="text-xl font-bold tracking-wider">LAB AI <span class="text-blue-400 text-xs block font-normal">Polinema</span></h1>
        </div>
    
    <div class="p-6 h-full overflow-y-auto scrollbar-hide" style="scrollbar-width: none; -ms-overflow-style: none;">

<style>
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}
</style>

            <a href="/admin/dashboard" class="flex items-center p-3 rounded-lg hover:bg-gray-700">
                <i class="fas fa-chart-line w-5 mr-3"></i>Dashboard
            </a>

            <p class="text-xs text-gray-400 uppercase pt-4 pb-1 px-3">Manajemen Data</p>

            <a href="/admin/Dosen" class="flex items-center p-3 hover:bg-gray-700 rounded-lg">
                <i class="fas fa-user-tie w-5 mr-3"></i>Member
            </a>


            <!-- DROPDOWN 1 -->
            <div class="dropdown-group">
                <button class="dropdown-btn flex items-center text-left justify-between w-full p-3 hover:bg-gray-700 rounded-lg">
                    <span class="flex items-center">
                        <i class="fas fa-book w-5 mr-4"></i>
                        Publikasi & Kegiatan Dosen
                    </span>
                    <i class="fas fa-chevron-right dropdown-icon transition-transform"></i>
                </button>

                <div class="dropdown-menu ml-10 mt-1 space-y-1 hidden">
                    <a href="/admin/PublikasiDosen" class="block p-2 text-gray-300 hover:bg-gray-700 rounded">Publikasi Ilmiah</a>
                    <a href="/admin/AktivitasDosen" class="block p-2 text-gray-300 hover:bg-gray-700 rounded">Aktivitas Dosen</a>
                    <a href="/admin/Ppm" class="block p-2 text-gray-300 hover:bg-gray-700 rounded">PPM</a>
                    <a href="/admin/RisetDosen" class="block p-2 text-gray-300 hover:bg-gray-700 rounded">Riset Dosen</a>
                    <a href="/admin/KekayaanIntelektual" class="block p-2 text-gray-300 hover:bg-gray-700 rounded">Kekayaan Intelektual</a>
                </div>
            </div>

            <!-- Other menus khusus admin -->
            <?php if ($_SESSION['user']['role'] === 'admin'): ?>
            <a href="/admin/Berita" class="flex items-center p-3  hover:bg-gray-700">
                <i class="fas fa-newspaper w-5 mr-3"></i>Berita
            </a>

            <?php endif; ?>
            <?php if ($_SESSION['user']['role'] === 'admin'): ?>
            <a href="/admin/Produk" class="flex items-center p-3  hover:bg-gray-700">
                <i class="fas fa-atom w-5 mr-3"></i>Produk
            </a>
            <?php endif; ?>

            <?php if ($_SESSION['user']['role'] === 'admin'): ?>
            <a href="/admin/partner" class="flex items-center p-3  hover:bg-gray-700">
                <i class="fa-solid fa-handshake w-5 mr-3"></i>Partner
            </a>
            <?php endif; ?>

            <?php if ($_SESSION['user']['role'] === 'admin'): ?>
            <a href="/admin/Fasilitas" class="flex items-center p-3  hover:bg-gray-700">
                <i class="fas fa-building w-5 mr-3"></i>Fasilitas
            </a>
            <?php endif; ?>
            
            <?php if ($_SESSION['user']['role'] === 'admin'): ?>
            <a href="/admin/galeri" class="flex items-center p-3  hover:bg-gray-700">
                <i class="fas fa-images w-5 mr-3"></i>Galeri
            </a>
            <?php endif; ?>

            
            <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                <a href="/admin/Kontak" class="flex items-center p-3 hover:bg-gray-700">
                    <i class="fas fa-contact-card w-5 mr-3"></i>Contact Us
                </a>
            <?php endif; ?>
            <p class="text-xs text-gray-400 uppercase pt-4 pb-1 px-3">Manajemen User</p>
            <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                <a href="/admin/User" class="flex items-center p-3 hover:bg-gray-700">
                    <i class="fas fa-user-shield w-5 mr-3"></i>Kelola User
                </a>
            <?php endif; ?>
        </nav>
    </div>
    
    <div class="flex items-center gap-3 border-t border-gray-700 p-4 mb-2">
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
            <p class="text-sm font-medium text-white truncate"><?= $_SESSION['user']['nama_dosen'];?><p>
            <p class="text-xs text-gray-400 truncate">(<?= ucfirst($_SESSION['user']['role']); ?>)</p>
        </div>
        
        <!-- Logout Button -->
        <a href="/admin/logout" class="text-gray-400 hover:text-red-400 transition-colors p-2 " title="Logout">
            <i class="fas fa-sign-out-alt text-lg"></i>
        </a>
    </div>

</aside>

<!-- DROPDOWN SCRIPT TANPA ALPINE -->
<script>
    document.querySelectorAll('.dropdown-group').forEach(group => {
        const btn = group.querySelector('.dropdown-btn');
        const menu = group.querySelector('.dropdown-menu');
        const icon = group.querySelector('.dropdown-icon');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            icon.classList.toggle('rotate-90');
        });
    });
</script>
