<section class="relative pt-32 pb-20 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-4 md:px-8">
        
        <!-- Page Header -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-4">
                News & <span class="text-blue-600">Articles</span>
            </h1>
            <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                Kumpulan berita, kegiatan, dan artikel ilmiah terbaru dari Lab Applied Informatics.
            </p>
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (count($news) > 0): ?>
                <?php foreach ($news as $berita): 
                    $dateObj = new DateTime($berita['tanggal']);
                    $formattedDate = $dateObj->format('d M Y');
                    $imgSrc = !empty($berita['gambar_utama']) ? $berita['gambar_utama'] : 'https://via.placeholder.com/400x300?text=No+Image';
                    $kats = explode(',', $berita['kategori']);
                    $mainKat = trim($kats[0] ?? 'General');
                ?>
                
                <article class="group relative flex flex-col h-full bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-200 overflow-hidden">
                    <div class="relative h-56 overflow-hidden">
                        <div class="absolute top-4 left-4 z-10">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur-md text-blue-700 text-xs font-bold rounded-lg shadow-sm uppercase">
                                <?= htmlspecialchars($mainKat) ?>
                            </span>
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