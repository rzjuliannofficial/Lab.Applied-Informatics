<!-- <header class="bg-white shadow-sm h-16 flex justify-between items-center px-6 sticky top-0 left-64 z-30"> -->
<header class="sticky md:ml-64 top-0 right-0 bg-white shadow-sm p-4 z-30 flex justify-between items-center left-64">
    <button class="md:hidden text-gray-600 hover:text-gray-900 focus:outline-none">
        <i class="fas fa-bars text-xl"></i>
    </button>

    <h2 class="hidden md:block text-lg font-semibold text-gray-700">
        <?= $title ?? "Dashboard"; ?>
    </h2>

    <div class="flex items-center gap-4 md:gap-6">
        <button class="text-gray-500 hover:text-blue-600 relative transition-colors">
            <i class="fas fa-bell text-lg"></i>
            <span class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full ring-2 ring-white"></span>
        </button>
        <button class="text-gray-500 hover:text-blue-600 relative transition-colors">
            <i class="fas fa-envelope text-lg"></i>
        </button>
        
        <div class="h-8 w-px bg-gray-200 mx-1"></div>

        <div class="flex items-center gap-3 cursor-pointer hover:bg-gray-50 p-1 rounded-lg transition">
            <div class="text-right hidden sm:block">
                <p class="text-sm font-semibold text-gray-700 leading-none">
                    <?= $_SESSION['user']['nama_dosen']; ?>
                </p>
                <p class="text-xs text-gray-500 mt-1"><?= $_SESSION['user']['role']; ?></p>
            </div>
            <img src="https://ui-avatars.com/api/?name=Nabhan+Rizqi&background=02416D&color=fff" alt="Profile" class="w-9 h-9 rounded-full border-2 border-gray-100 shadow-sm">
        </div>
    </div>
</header>
