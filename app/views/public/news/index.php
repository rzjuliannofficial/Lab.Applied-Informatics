<section class="section pt-0">
    <div class="member-hero-section pt-[8rem] pb-[6rem] mx-auto flex flex-col items-center bg-gradient-to-r from-[var(--blue)] to-[var(--blue-dark)]">
        <!-- Floating Icons -->
        <i class="fa-solid fa-bolt floating-icon" style="font-size: 3rem;"></i>
        <i class="fas fa-graduation-cap floating-icon" style="font-size: 2.5rem;"></i>
        <i class="fas fa-brain floating-icon" style="font-size: 3rem;"></i>
        <i class="fas fa-lightbulb floating-icon" style="font-size: 2.5rem;"></i>
        <div class="relative z-10 flex items-center gap-2 text-blue-200 font-semibold mb-4" data-aos="fade-up">
            <i class="fa-solid fa-bolt text-yellow-500 text-sm mr-2"></i> 
            <span class="uppercase tracking-wider text-sm">Hot Topics</span>
        </div>

        <!-- Judul Utama -->
        <h2 class="text-5xl md:text-6xl font-extrabold tracking-tight mb-6 text-white" data-aos="fade-up" data-aos-delay="100">
            Academic News & Articles
        </h2>

        <!-- Deskripsi -->
        <p class="text-lg md:text-xl text-blue-100 leading-relaxed max-w-3xl mb-14 text-center" data-aos="fade-up" data-aos-delay="200">
            Explore our collection of the latest news, scientific publications, and academic activities that demonstrate our dedication to the development of information technology.
        </p>
    </div>
            
    <div class="container mt-[5rem]">
        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (count($news) > 0): ?>
                <?php foreach ($news as $berita): 
                    $dateObj = new DateTime($berita['tanggal']);
                    $formattedDate = $dateObj->format('d M Y');
                    $imgSrc = !empty($berita['gambar_utama']) ? $berita['gambar_utama'] : 'https://via.placeholder.com/400x300?text=No+Image';
                ?>
                
                <article class="group relative flex flex-col h-full bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-200 overflow-hidden">
                    <div class="relative h-56 overflow-hidden">
                        <div class="absolute top-4 left-4 z-10">
                            <?php if (!empty($berita['kategori'])) {
                                $kategori = explode(',', $berita['kategori']);
                                $kategori = array_slice($kategori, 0, 3); 
                                foreach ($kategori as $category): ?>
                                    <span class="px-3 py-1 bg-white/90 backdrop-blur-md text-blue-700 text-xs font-bold rounded-lg shadow-sm border border-white/50 tracking-wider uppercase mr-2">
                                        <?= htmlspecialchars(trim($category)); ?>
                                    </span>
                            <?php endforeach; } else { ?>
                                <span class="text-gray-400 text-xs italic">-</span>
                            <?php } ?>
                        </div>
                        <img src="<?= htmlspecialchars($imgSrc) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                    </div>

                    <div class="flex flex-col flex-grow p-6">
                        <div class="flex items-center gap-2 text-xs text-slate-400 mb-3">
                            <i class="far fa-calendar-alt"></i> <?= $formattedDate ?>
                            <span>•</span>
                            <i class="far fa-user"></i> <?= htmlspecialchars($berita['nama_pembuat']) ?>
                        </div>

                        <a href="/news/detail/<?= $berita['id'] ?>">
                            <h3 class="text-lg font-bold text-slate-800 mb-3 leading-snug group-hover:text-blue-600 transition-colors line-clamp-2" title="<?= htmlspecialchars($berita['judul']) ?>">
                                <?= htmlspecialchars($berita['judul']) ?>
                            </h3>
                        </a>

                        <p class="text-slate-500 text-sm leading-relaxed mb-4 line-clamp-3 flex-grow">
                            <?= htmlspecialchars(strip_tags($berita['isi_berita'])) ?>
                        </p>

                        <a href="/news/detail/<?= $berita['id'] ?>" class="inline-flex items-center gap-1 text-sm font-bold text-blue-600 group-hover:translate-x-1 transition-transform mt-auto">
                            Baca Selengkapnya <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full text-center py-20">
                    <div class="inline-block p-4 rounded-full bg-slate-100 mb-4">
                        <i class="far fa-newspaper text-4xl text-slate-400"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-700">Belum ada berita</h3>
                    <p class="text-slate-500">Silakan cek kembali nanti.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>