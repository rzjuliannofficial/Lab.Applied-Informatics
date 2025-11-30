<?php
    $dateObj = new DateTime($berita['tanggal']);
    $formattedDate = $dateObj->format('l, d F Y');
    $imgSrc = !empty($berita['gambar_utama']) ? $berita['gambar_utama'] : '';
?>

<section class="relative pb-20">
    <div class="container mx-auto px-4 md:px-8 lg:px-40">
        
        <!-- Breadcrumb & Back -->
        <div class="mb-8 flex items-center justify-between">
            <a href="/news" class="inline-flex items-center gap-2 text-slate-500 hover:text-blue-600 transition-colors font-medium">
                <i class="fas fa-arrow-left"></i> Kembali ke Berita
            </a>
            <span class="text-slate-400 text-sm">News / Detail</span>
        </div>

        <!-- Header Artikel -->
        <div class="text-center mb-10">
            <span class="inline-block px-4 py-1.5 bg-blue-50 text-blue-600 rounded-full text-sm font-bold uppercase tracking-wide mb-4">
                <?= htmlspecialchars($berita['kategori']) ?>
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-slate-900 leading-tight mb-6">
                <?= htmlspecialchars($berita['judul']) ?>
            </h1>
            
            <div class="flex items-center justify-center gap-6 text-slate-500 text-sm">
                <div class="flex items-center gap-2">
                    <i class="far fa-calendar-alt text-blue-500"></i>
                    <span><?= $formattedDate ?></span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="far fa-user text-blue-500"></i>
                    <span><?= htmlspecialchars($berita['nama_pembuat']) ?></span>
                </div>
            </div>
        </div>

        <!-- Featured Image -->
        <div class="rounded-2xl overflow-hidden shadow-2xl mb-12 border border-slate-100">
            <img src="<?= htmlspecialchars($imgSrc) ?>" alt="Featured Image" class="w-full h-auto object-cover max-h-[600px]">
        </div>

        <!-- Konten Artikel -->
        <div class="prose prose-lg prose-blue mx-auto text-slate-600 leading-relaxed text-justify">
            <!-- nl2br untuk mengubah baris baru di database menjadi <br> di HTML -->
            <?= nl2br(htmlspecialchars($berita['isi_berita'])) ?>
        </div>
    </div>
</section>