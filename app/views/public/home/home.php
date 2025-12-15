<section class="hero min-h-screen flex items-center relative overflow-hidden bg-gradient-to-br from-white via-blue-50/30 to-white">
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-400/10 rounded-full blur-[100px] -z-10 animate-pulse"></div>

    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <div class="order-2 lg:order-1 flex flex-col items-center lg:items-start text-center lg:text-left" data-aos="fade-right">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 border border-blue-100 text-blue-600 text-sm font-semibold mb-6">
                    <span class="relative flex h-3 w-3">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500"></span>
                    </span>
                    Innovation Center
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 leading-tight mb-6">
                    Welcome to <br class="hidden lg:block">
                    <span class="gradient-text">Applied Informatics</span>
                </h1>
                
                <p class="text-lg text-slate-600 mb-8 max-w-lg leading-relaxed">
                    The Applied Informatics Laboratory at Malang State Polytechnic is an innovation center focused on developing IT-based solutions.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                    <a href="/product" class="button-primary text-center justify-center flex items-center gap-2 drop-shadow-lg shadow-blue-500/30">
                        Explore Our Work <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="/contact" class="button-secondary text-center justify-center">
                        Connect With Us
                    </a>
                </div>

                <div class="w-full max-w-md mt-12 relative"> 
                    <div class="logo-carousel-container h-16 sm:h-20">
                        <div class="logo-carousel-track flex items-center">
                            <?php 
                            $logos = [
                                'OwnCloud2-Logo.svg_-300x157.png', 'seals.png', 'amati.png', 
                                'gitea-300x107-removebg-preview.png', 'logo_blockchain-1024x305.png', 'ijo-removebg-preview.png'
                            ];
                            // Render Twice for Infinite Loop Effect
                            foreach(array_merge($logos, $logos) as $logo): ?>
                                <div class="logo-item px-4">
                                    <img src="uploads/home/<?= $logo ?>" alt="Partner Logo" class="h-8 sm:h-10 w-auto opacity-70 grayscale hover:grayscale-0 transition-all duration-300">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="absolute inset-0 pointer-events-none bg-gradient-to-r from-white via-transparent to-white"></div>
                    </div>
                </div>
            </div>

            <div class="order-1 lg:order-2 relative" data-aos="fade-left">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border-8 border-white transform rotate-2 hover:rotate-0 transition-transform duration-500">
                    <img src="/uploads/home/rapat_ai.jpg" alt="Lab Activity" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                </div>
                <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl hidden md:block animate-bounce">
                    <div class="flex items-center gap-3">
                        <div class="bg-green-100 p-2 rounded-full text-green-600">
                            <i class="fa-solid fa-code-branch text-xl"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-bold">Projects</p>
                            <p class="text-lg font-bold text-slate-800">100+ Completed</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="section bg-slate-50 relative">
    <div class="container mx-auto">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-block py-1 px-3 rounded-full bg-blue-100 text-blue-600 text-sm font-bold mb-4">
                <i class="fa-solid fa-compass mr-2"></i> OUR DIRECTION
            </span>
            <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 tracking-tight">
                Visi & <span class="gradient-text">Misi</span>
            </h2>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">
                Guiding principles that drive our innovation and commitment to excellence.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            
            <div class="relative lg:sticky lg:top-28 h-fit z-10" data-aos="fade-right">
                <div class="bg-white rounded-[2rem] p-8 shadow-xl border border-blue-50 overflow-hidden relative group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/10 rounded-full blur-3xl -mr-10 -mt-10 transition-all group-hover:bg-blue-500/20"></div>
                    
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-500/30">
                            <i class="fa-solid fa-eye text-2xl"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-slate-800">Visi Kami</h3>
                    </div>

                    <p class="text-slate-600 leading-relaxed text-lg mb-6">
                        Menjadi laboratorium unggulan dalam pengembangan dan penerapan teknologi informasi inovatif yang mendukung transformasi digital berkelanjutan.
                    </p>
                    
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-slate-700 font-medium">
                            <i class="fa-solid fa-circle-check text-blue-500"></i> Inovasi Berkelanjutan
                        </li>
                        <li class="flex items-center gap-3 text-slate-700 font-medium">
                            <i class="fa-solid fa-circle-check text-blue-500"></i> Dampak Nyata Industri
                        </li>
                        <li class="flex items-center gap-3 text-slate-700 font-medium">
                            <i class="fa-solid fa-circle-check text-blue-500"></i> Pusat Keunggulan Riset
                        </li>
                    </ul>
                </div>
            </div>

            <div class="space-y-6">
                <?php 
                $misis = [
                    ['icon' => 'fa-database', 'title' => 'Information Systems', 'desc' => 'Menerapkan teknologi informasi terkini, algoritma, dan pengolahan data untuk solusi praktis.', 'color' => 'blue'],
                    ['icon' => 'fa-microchip', 'title' => 'IoT & AI Technologies', 'desc' => 'Berfokus solusi Industri 4.0 dengan otomasi, integrasi sistem, dan pemrosesan data real-time.', 'color' => 'indigo'],
                    ['icon' => 'fa-flask', 'title' => 'Research & Collaboration', 'desc' => 'Sinergi antara industri, pemerintah, dan akademisi untuk ekosistem inovasi yang inklusif.', 'color' => 'cyan'],
                    ['icon' => 'fa-code', 'title' => 'Application Development', 'desc' => 'Pengembangan Blockchain, Big Data, dan Machine Learning untuk integritas informasi.', 'color' => 'sky'],
                ];
                foreach($misis as $index => $misi): ?>
                <div class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group" 
                     data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="flex flex-col sm:flex-row gap-5 items-start">
                        <div class="w-12 h-12 rounded-xl bg-<?= $misi['color'] ?>-50 flex items-center justify-center text-<?= $misi['color'] ?>-600 flex-shrink-0 group-hover:bg-<?= $misi['color'] ?>-600 group-hover:text-white transition-colors duration-300">
                            <i class="fa-solid <?= $misi['icon'] ?> text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-800 mb-2">Misi <?= $index + 1 ?></h4>
                            <p class="text-slate-600 leading-relaxed text-sm mb-3">
                                <?= $misi['desc'] ?>
                            </p>
                            <span class="text-xs font-bold text-<?= $misi['color'] ?>-600 bg-<?= $misi['color'] ?>-50 px-2 py-1 rounded">
                                <?= $misi['title'] ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<section class="section bg-white">
    <div class="container mx-auto">
        <div class="text-center mb-16">
            <span class="text-blue-600 font-bold tracking-wider text-sm uppercase">Focus Area</span>
            <h2 class="text-3xl md:text-5xl font-extrabold mt-2 text-slate-900">Our Core <span class="gradient-text">Scope</span></h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
            <div class="scope-card bg-slate-50 hover:bg-white p-8 rounded-3xl border border-slate-100 hover:border-blue-200 transition-all duration-300 group" data-aos="fade-up">
                <div class="flex items-center gap-4 mb-4">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-xl group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-laptop-code text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">Intelligent Learning</h3>
                </div>
                <p class="text-slate-600 mb-4 text-sm leading-relaxed">Smart self-learning ecosystem including Web, Mobile, Database, and Java with Gamification.</p>
                <div class="flex flex-wrap gap-2">
                    <span class="text-xs font-semibold bg-white border border-slate-200 px-2 py-1 rounded text-slate-500">Gamification</span>
                    <span class="text-xs font-semibold bg-white border border-slate-200 px-2 py-1 rounded text-slate-500">Scaffolding</span>
                </div>
            </div>
            
            <div class="scope-card bg-slate-50 hover:bg-white p-8 rounded-3xl border border-slate-100 hover:border-green-200 transition-all duration-300 group" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center gap-4 mb-4">
                    <div class="p-3 bg-green-100 text-green-600 rounded-xl group-hover:bg-green-600 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-seedling text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">Smartfarming</h3>
                </div>
                <p class="text-slate-600 mb-4 text-sm leading-relaxed">Integrating IoT and data analytics for optimizing modern agriculture and sustainability.</p>
                <div class="flex flex-wrap gap-2">
                    <span class="text-xs font-semibold bg-white border border-slate-200 px-2 py-1 rounded text-slate-500">IoT</span>
                    <span class="text-xs font-semibold bg-white border border-slate-200 px-2 py-1 rounded text-slate-500">Agriculture</span>
                </div>
            </div>

            <div class="scope-card bg-slate-50 hover:bg-white p-8 rounded-3xl border border-slate-100 hover:border-purple-200 transition-all duration-300 group" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center gap-4 mb-4">
                    <div class="p-3 bg-purple-100 text-purple-600 rounded-xl group-hover:bg-purple-600 group-hover:text-white transition-colors">
                        <i class="fa-brands fa-ethereum text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">Blockchain Ethereum</h3>
                </div>
                <p class="text-slate-600 mb-4 text-sm leading-relaxed">Decentralized systems on Ethereum. Transparency in Supply Chain and Asset Tokenization.</p>
                 <div class="flex flex-wrap gap-2">
                    <span class="text-xs font-semibold bg-white border border-slate-200 px-2 py-1 rounded text-slate-500">Smart Contract</span>
                    <span class="text-xs font-semibold bg-white border border-slate-200 px-2 py-1 rounded text-slate-500">DeFi</span>
                </div>
            </div>

            <div class="scope-card bg-slate-50 hover:bg-white p-8 rounded-3xl border border-slate-100 hover:border-red-200 transition-all duration-300 group" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center gap-4 mb-4">
                    <div class="p-3 bg-red-100 text-red-600 rounded-xl group-hover:bg-red-600 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-shield-halved text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">Cyber Security (SIEM)</h3>
                </div>
                <p class="text-slate-600 mb-4 text-sm leading-relaxed">Wazuh based security system. Real-time threat detection and automated incident response.</p>
                 <div class="flex flex-wrap gap-2">
                    <span class="text-xs font-semibold bg-white border border-slate-200 px-2 py-1 rounded text-slate-500">Wazuh</span>
                    <span class="text-xs font-semibold bg-white border border-slate-200 px-2 py-1 rounded text-slate-500">SecOps</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section py-20 bg-slate-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
            <div data-aos="fade-right">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">Latest <span class="gradient-text">News</span></h2>
                <p class="text-slate-500 mt-2">Discover our latest activities and achievements.</p>
            </div>
            <a href="/news" class="hidden md:flex items-center gap-2 text-blue-600 font-bold hover:gap-3 transition-all">
                View All News <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (count($news) > 0): ?>
                <?php foreach (array_slice($news, 0, 3) as $index => $berita): 
                    $dateObj = new DateTime($berita['tanggal']);
                    $imgSrc = !empty($berita['gambar_utama']) ? $berita['gambar_utama'] : 'https://via.placeholder.com/400x300?text=News';
                ?>
                <article class="group bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-xl transition-all duration-300 h-full flex flex-col" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="relative h-56 overflow-hidden">
                        <img src="<?= htmlspecialchars($imgSrc) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="News Image">
                        <div class="absolute bottom-3 left-3 bg-white/90 backdrop-blur px-3 py-1 rounded-lg text-xs font-bold text-slate-800 shadow-sm">
                            <?= $dateObj->format('d M Y') ?>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <a href="/news/detail/<?= $berita['id'] ?>">
                            <h3 class="text-lg font-bold text-slate-800 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors">
                                <?= htmlspecialchars($berita['judul']) ?>
                            </h3>
                        </a>
                        <p class="text-slate-500 text-sm line-clamp-3 mb-4 flex-grow">
                            <?= htmlspecialchars(strip_tags($berita['isi_berita'])) ?>
                        </p>
                        <div class="pt-4 border-t border-slate-100 flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-xs font-bold">
                                <?= substr($berita['nama_pembuat'], 0, 1) ?>
                            </div>
                            <span class="text-xs font-semibold text-slate-600"><?= htmlspecialchars($berita['nama_pembuat']) ?></span>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full text-center text-gray-400">Belum ada berita.</div>
            <?php endif; ?>
        </div>
        
        <div class="mt-8 text-center md:hidden">
            <a href="/news" class="button-primary w-full block">View All News</a>
        </div>
    </div>
</section>
<section class="section bg-white">
    <div class="container mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">Our <span class="gradient-text">Products</span></h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach (array_slice($products, 0, 3) as $index => $product): ?>
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-6 flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <div class="h-32 w-full flex items-center justify-center mb-6 bg-slate-50 rounded-xl p-4">
                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="Product" class="max-h-full max-w-full object-contain">
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-2"><?= htmlspecialchars($product['nama_produk']) ?></h3>
                <p class="text-sm text-slate-500 line-clamp-2 mb-4"><?= htmlspecialchars($product['deskripsi']) ?></p>
                <a href="<?= htmlspecialchars($product['link_demo']) ?>" class="mt-auto text-blue-600 font-semibold text-sm hover:underline">View Demo</a>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-10">
            <a href="/product" class="button-secondary">See All Products</a>
        </div>
    </div>
</section>
<section class="section bg-slate-50">
    <div class="container mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">Expert <span class="gradient-text">Team</span></h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <?php foreach (array_slice($team, 0, 4) as $member): ?>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4 hover:shadow-md transition-shadow" data-aos="fade-up">
                <img src="<?= !empty($member['foto_profil']) ? htmlspecialchars($member['foto_profil']) : 'https://ui-avatars.com/api/?name='.urlencode($member['nama']) ?>" 
                     class="w-20 h-20 rounded-full object-cover border-2 border-blue-100" alt="Team">
                <div>
                    <h4 class="font-bold text-slate-800 text-lg"><?= htmlspecialchars($member['nama']) ?></h4>
                    <p class="text-xs text-blue-600 font-semibold mb-1"><?= htmlspecialchars($member['email']) ?></p>
                    <div class="flex gap-2 text-gray-400 text-sm">
                         <?php if(!empty($member['google_scholar'])): ?><a href="<?= $member['google_scholar'] ?>" class="hover:text-blue-600"><i class="fas fa-graduation-cap"></i></a><?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-8">
            <a href="/member" class="button-secondary">Meet The Team</a>
        </div>
    </div>
</section>
<section class="section bg-white">
    <div class="container mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-slate-900">Lab <span class="gradient-text">Facilities</span></h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-slate-900 text-white rounded-3xl p-8 flex flex-col justify-center shadow-xl md:col-span-1 min-h-[300px]" data-aos="fade-right">
                <h3 class="text-2xl font-bold mb-4 text-blue-400">Research Center</h3>
                <p class="text-slate-300 mb-6 leading-relaxed">
                    Ruang laboratorium nyaman dengan PC High-End, VS Code, Android Studio, dan koneksi dedicated.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-white/10 rounded-full text-xs">Full AC</span>
                    <span class="px-3 py-1 bg-white/10 rounded-full text-xs">100Mbps WiFi</span>
                    <span class="px-3 py-1 bg-white/10 rounded-full text-xs">Smart TV</span>
                </div>
            </div>

            <div class="md:col-span-2 rounded-3xl overflow-hidden shadow-lg h-[300px] relative group" data-aos="fade-left">
                <?php if(!empty($items[0]['foto'])): ?>
                <img src="<?= htmlspecialchars($items[0]['foto']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                    <span class="text-white font-bold text-lg"><?= htmlspecialchars($items[0]['nama_fasilitas']) ?></span>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
             <div class="md:col-span-2 rounded-3xl overflow-hidden shadow-lg h-[250px] relative group" data-aos="fade-up">
                 <?php if(!empty($items[1]['foto'])): ?>
                <img src="<?= htmlspecialchars($items[1]['foto']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                    <span class="text-white font-bold text-lg"><?= htmlspecialchars($items[1]['nama_fasilitas']) ?></span>
                </div>
                <?php endif; ?>
            </div>
             <div class="md:col-span-1 rounded-3xl overflow-hidden shadow-lg h-[250px] relative group" data-aos="fade-up" data-aos-delay="100">
                 <?php if(!empty($items[2]['foto'])): ?>
                <img src="<?= htmlspecialchars($items[2]['foto']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                    <span class="text-white font-bold text-lg"><?= htmlspecialchars($items[2]['nama_fasilitas']) ?></span>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>