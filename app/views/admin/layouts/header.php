<!-- <header class="bg-white shadow-sm h-16 flex justify-between items-center px-6 sticky top-0 left-64 z-30"> -->
<header class="sticky md:ml-64 top-0 right-0 bg-white shadow-sm p-4 z-30 flex justify-between items-center left-64">
    <button id="toggleSidebar" class="md:hidden text-gray-600 hover:text-gray-900 focus:outline-none transition-colors">
        <i class="fas fa-bars text-xl"></i>
    </button>

    <h2 class="hidden md:block text-lg font-semibold text-gray-700">
        <?= $data['title'] ?? 'Dashboard'; ?>
    </h2>

    <div class="flex items-center gap-4 md:gap-6">
        
        <div class="h-8 w-px bg-gray-200 mx-1"></div>

        <div class="flex items-center gap-3 p-1 ">
            <div class="text-right hidden sm:block">
                <p class="text-sm font-semibold text-gray-700 leading-none">
                    <?= $_SESSION['user']['nama_dosen']; ?>
                </p>
                <p class="text-xs text-gray-500 mt-1"><?= ucfirst($_SESSION['user']['role']); ?></p>
            </div>
        </div>
    </div>
</header>

<!-- Overlay untuk sidebar mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden"></div>

<script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.querySelector('aside');
    const overlay = document.getElementById('sidebarOverlay');

    // Toggle sidebar saat tombol menu diklik
    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    });

    // Tutup sidebar saat overlay diklik
    overlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    });

    // Tutup sidebar saat link menu diklik
    document.querySelectorAll('aside a').forEach(link => {
        link.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    });
</script>
