<aside class="fixed inset-y-0 left-0 w-64 bg-[#0f172a] transition-transform duration-300 transform -translate-x-full md:translate-x-0 z-50 flex flex-col border-r border-slate-800 shadow-2xl">
    
    <div class="h-16 flex items-center px-6 border-b border-slate-800/50 bg-[#0f172a]">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 relative">
                <img src="/uploads/home/logoAi.png" class="object-contain w-full h-full drop-shadow-[0_0_10px_rgba(59,130,246,0.5)]">
            </div>
            <div>
                <h1 class="text-lg font-bold text-white tracking-wide leading-none">LAB <span class="text-blue-500">AI</span></h1>
                <span class="text-[10px] text-slate-500 font-medium tracking-widest uppercase">Polinema</span>
            </div>
        </div>
    </div>
    
    <div class="flex-1 overflow-y-auto py-6 px-4 space-y-1 scrollbar-hide">
        
        <style>
            .scrollbar-hide::-webkit-scrollbar { display: none; }
            .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        </style>

        <a href="/admin/dashboard" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-slate-200 hover:bg-white/5 hover:text-white transition-all duration-200 ">
            <i class="fas fa-th-large w-5 mr-3 text-center"></i>
            Dashboard
        </a>

        <div class="pt-5 pb-2 px-4">
            <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Manajemen Data</p>
        </div>
       
        <a href="/admin/dosen" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-slate-200 hover:bg-white/5 hover:text-white transition-all duration-200">
            <i class="fas fa-users w-5 mr-3 text-center"></i>
            Member Lab
        </a>

        <div class="dropdown-group relative">
            <button class="dropdown-btn w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl text-slate-200 hover:bg-white/5 hover:text-white transition-all duration-200">
                <div class="flex items-center">
                    <i class="fas fa-layer-group w-5 mr-3 text-center"></i>
                    <span>Aktivitas & Karya</span>
                </div>
                <i class="fas fa-chevron-right text-xs transition-transform duration-300 dropdown-icon"></i>
            </button>

            <div class="dropdown-menu mt-1 pl-4 space-y-1 hidden">
                <div class="border-l-2 border-slate-700 pl-2 space-y-1">
                    <a href="/admin/publikasiDosen" class="block px-4 py-2 text-sm rounded-lg text-slate-400 hover:text-white transition-colors">Publikasi Ilmiah</a>
                    <a href="/admin/aktivitasDosen" class="block px-4 py-2 text-sm rounded-lg text-slate-400 hover:text-white transition-colors">Aktivitas Dosen</a>
                    <a href="/admin/ppm" class="block px-4 py-2 text-sm rounded-lg text-slate-400 hover:text-white transition-colors">Pengabdian (PPM)</a>
                    <a href="/admin/risetDosen" class="block px-4 py-2 text-sm rounded-lg text-slate-400 hover:text-white transition-colors">Riset & Penelitian</a>
                    <a href="/admin/kekayaanIntelektual" class="block px-4 py-2 text-sm rounded-lg text-slate-400 hover:text-white transition-colors">HKI / Paten</a>
                </div>
            </div>
        </div>

        <?php if ($_SESSION['user']['role'] === 'admin'): ?>
            
            <div class="pt-5 pb-2 px-4">
                <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Administrator</p>
            </div>

            <a href="/admin/berita" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-slate-200 hover:bg-white/5 hover:text-white transition-all duration-200">
                <i class="fas fa-newspaper w-5 mr-3 text-center"></i>
                Berita & Artikel
            </a>

            <a href="/admin/produk" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-slate-200 hover:bg-white/5 hover:text-white transition-all duration-200">
                <i class="fas fa-box-open w-5 mr-3 text-center"></i>
                Produk Hilirisasi
            </a>

            <a href="/admin/partner" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-slate-200 hover:bg-white/5 hover:text-white transition-all duration-200">
                <i class="fas fa-handshake w-5 mr-3 text-center"></i>
                Partnership
            </a>

            <a href="/admin/fasilitas" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-slate-200 hover:bg-white/5 hover:text-white transition-all duration-200">
                <i class="fas fa-tools w-5 mr-3 text-center"></i>
                Fasilitas Lab
            </a>

            <a href="/admin/galeri" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-slate-200 hover:bg-white/5 hover:text-white transition-all duration-200">
                <i class="fas fa-images w-5 mr-3 text-center"></i>
                Galeri Foto
            </a>

            <a href="/admin/kontak" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-slate-200 hover:bg-white/5 hover:text-white transition-all duration-200">
                <i class="fas fa-inbox w-5 mr-3 text-center"></i>
                Pesan Masuk
            </a>

            <div class="pt-5 pb-2 px-4">
                <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Manajemen User</p>
            </div>
            
            <a href="/admin/user" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-slate-200 hover:bg-white/5 hover:text-white transition-all duration-200">
                <i class="fas fa-user-shield w-5 mr-3 text-center"></i>
                Kelola User
            </a>

        <?php endif; ?>
    </div>

    <div class="p-4 border-t border-slate-800 bg-[#0f172a]">
        <div class="flex items-center gap-3 p-3 rounded-xl bg-slate-800/50 hover:bg-slate-800 transition-colors border border-slate-700/50">
            <div class="relative flex-shrink-0">
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-600 to-cyan-500 flex items-center justify-center text-white font-bold text-sm shadow-lg">
                    <?= strtoupper(substr($_SESSION['user']['nama_dosen'] ?? 'U', 0, 1)) ?>
                </div>
                <span class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 border-2 border-slate-900 rounded-full"></span>
            </div>
            
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-white truncate">
                    <?= htmlspecialchars($_SESSION['user']['nama_dosen'] ?? 'User') ?>
                </p>
                <p class="text-xs text-slate-400 truncate capitalize">
                    <?= $_SESSION['user']['role'] ?? 'Guest' ?>
                </p>
            </div>
            
            <a href="/admin/logout" class="text-slate-400 hover:text-red-400 hover:bg-red-400/10 p-2 rounded-lg transition-all" title="Keluar">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>
</aside>

<script>
    document.querySelectorAll('.dropdown-group').forEach(group => {
        const btn = group.querySelector('.dropdown-btn');
        const menu = group.querySelector('.dropdown-menu');
        const icon = group.querySelector('.dropdown-icon');

        btn.addEventListener('click', (e) => {
            menu.classList.toggle('hidden');
            icon.classList.toggle('rotate-90');
        });
    });
</script>