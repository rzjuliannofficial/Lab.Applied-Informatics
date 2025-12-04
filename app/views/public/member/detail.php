<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($data['title']); ?></title>
    <link rel="stylesheet" href="/style/Style.css">
    <link rel="shortcut icon" href="/uploads/home/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <?php 
        $member = $data['member'];
        $publications = $data['publications'] ?? [];
    ?>

    <!-- Hero Section with Profile -->
    <section class="relative bg-gradient-to-br from-[var(--blue)] via-[var(--blue-dark)] to-[var(--blue-dark)] pt-32 pb-20 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-300 rounded-full blur-3xl"></div>
        </div>

        <!-- Floating Icons -->
        <i class="fas fa-atom floating-icon absolute" style="font-size: 2.5rem; top: 15%; left: 8%; opacity: 0.15;"></i>
        <i class="fas fa-microscope floating-icon absolute" style="font-size: 2rem; top: 25%; right: 12%; opacity: 0.15;"></i>
        <i class="fas fa-flask floating-icon absolute" style="font-size: 2.2rem; bottom: 20%; left: 15%; opacity: 0.15;"></i>
        
        <div class="container relative z-10">
            <div class="max-w-6xl mx-auto">
                <!-- Back Button -->
                <a href="/member" class="inline-flex items-center gap-2 text-white/80 hover:text-white transition-colors mb-8 group" data-aos="fade-right">
                    <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                    <span class="font-medium">Back to Members</span>
                </a>

                <div class="grid lg:grid-cols-3 gap-10 items-start">
                    <!-- Profile Card -->
                    <div class="lg:col-span-1" data-aos="fade-up" data-aos-delay="100">
                        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-white/20">
                            <!-- Profile Image -->
                            <div class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 relative overflow-hidden">
                                <?php if (!empty($member['foto_profil'])): ?>
                                    <img src="<?= htmlspecialchars($member['foto_profil']); ?>" 
                                         alt="<?= htmlspecialchars($member['nama']); ?>" 
                                         class="w-full h-full object-cover">
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200">
                                        <i class="fas fa-user text-9xl text-blue-300"></i>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Position Badge -->
                                <div class="absolute top-4 right-4">
                                    <span class="inline-block bg-white/95 backdrop-blur-sm text-[var(--blue-dark)] px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider shadow-lg border border-blue-100">
                                        <?= htmlspecialchars($member['jabatan']); ?>
                                    </span>
                                </div>
                            </div>

                            <!-- Contact Info -->
                            <div class="p-6 space-y-4">
                                <div class="flex items-center gap-3 text-gray-600 hover:text-[var(--blue)] transition-colors">
                                    <i class="fas fa-envelope text-lg w-5"></i>
                                    <a href="mailto:<?= htmlspecialchars($member['email']); ?>" class="text-sm break-all">
                                        <?= htmlspecialchars($member['email']); ?>
                                    </a>
                                </div>

                                <div class="flex items-center gap-3 text-gray-600">
                                    <i class="fas fa-id-card text-lg w-5"></i>
                                    <span class="text-sm font-mono"><?= htmlspecialchars($member['nip'] ?? 'N/A'); ?></span>
                                </div>

                                <!-- Academic Links -->
                                <?php if (!empty($member['google_scholar']) || !empty($member['researcher']) || !empty($member['orcid'])): ?>
                                    <div class="pt-4 border-t border-gray-200 space-y-3">
                                        <?php if (!empty($member['google_scholar'])): ?>
                                            <a href="<?= htmlspecialchars($member['google_scholar']); ?>" 
                                               target="_blank"
                                               class="flex items-center gap-3 text-gray-700 hover:text-[var(--blue)] transition-all group">
                                                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center group-hover:from-blue-100 group-hover:to-blue-200 transition-all">
                                                    <i class="fas fa-graduation-cap text-[var(--blue-dark)] group-hover:scale-110 transition-transform"></i>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Google Scholar</p>
                                                    <p class="text-sm font-medium truncate group-hover:text-[var(--blue)]">View Profile</p>
                                                </div>
                                                <i class="fas fa-external-link-alt text-xs text-gray-400 group-hover:text-[var(--blue)]"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($member['researcher'])): ?>
                                            <a href="<?= htmlspecialchars($member['researcher']); ?>" 
                                               target="_blank"
                                               class="flex items-center gap-3 text-gray-700 hover:text-green-600 transition-all group">
                                                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-green-50 to-green-100 flex items-center justify-center group-hover:from-green-100 group-hover:to-green-200 transition-all">
                                                    <i class="fas fa-user-graduate text-green-700 group-hover:scale-110 transition-transform"></i>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">ResearchGate</p>
                                                    <p class="text-sm font-medium truncate group-hover:text-green-600">View Profile</p>
                                                </div>
                                                <i class="fas fa-external-link-alt text-xs text-gray-400 group-hover:text-green-600"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($member['orcid'])): ?>
                                            <a href="<?= htmlspecialchars($member['orcid']); ?>" 
                                               target="_blank"
                                               class="flex items-center gap-3 text-gray-700 hover:text-purple-600 transition-all group">
                                                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-50 to-purple-100 flex items-center justify-center group-hover:from-purple-100 group-hover:to-purple-200 transition-all">
                                                    <i class="fab fa-orcid text-purple-700 group-hover:scale-110 transition-transform"></i>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">ORCID</p>
                                                    <p class="text-sm font-medium truncate group-hover:text-purple-600">View Profile</p>
                                                </div>
                                                <i class="fas fa-external-link-alt text-xs text-gray-400 group-hover:text-purple-600"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Details -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Name & Title -->
                        <div data-aos="fade-up" data-aos-delay="200">
                            <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-3 leading-tight">
                                <?= htmlspecialchars($member['nama']); ?>
                            </h1>
                            <div class="flex items-center gap-2 text-blue-100">
                                <i class="fas fa-briefcase"></i>
                                <span class="text-lg font-medium capitalize">
                                    <?= str_replace('_', ' ', htmlspecialchars($member['jabatan'])); ?>
                                </span>
                            </div>
                        </div>

                        <!-- Bio -->
                        <?php if (!empty($member['deskripsi'])): ?>
                            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20" data-aos="fade-up" data-aos-delay="300">
                                <h2 class="text-xl font-bold text-white mb-3 flex items-center gap-2">
                                    <i class="fas fa-user-circle text-blue-200"></i>
                                    About
                                </h2>
                                <p class="text-blue-50 leading-relaxed text-base">
                                    <?= nl2br(htmlspecialchars($member['deskripsi'])); ?>
                                </p>
                            </div>
                        <?php endif; ?>

                        <!-- Research Interests -->
                        <?php if (!empty($member['keahlian_text'])): ?>
                            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20" data-aos="fade-up" data-aos-delay="400">
                                <h2 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                                    <i class="fas fa-lightbulb text-yellow-300"></i>
                                    Research Interests
                                </h2>
                                <div class="flex flex-wrap gap-3">
                                    <?php 
                                    $skills = explode(',', $member['keahlian_text']);
                                    foreach ($skills as $skill): ?>
                                        <span class="bg-white/20 backdrop-blur-sm text-white px-5 py-2 rounded-full text-sm font-semibold border border-white/30 hover:bg-white/30 transition-all">
                                            <?= htmlspecialchars(trim($skill)); ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Publications & Research Section with Tabs -->
    <section class="py-20 bg-gray-50">
        <div class="container">
            <div class="max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-8" data-aos="fade-up">
                    <h2 class="text-4xl font-extrabold text-gray-900 mb-3">
                        Academic Contributions
                    </h2>
                    <p class="text-gray-600 text-lg">
                        Explore publications, research, and other academic works
                    </p>
                </div>

                <!-- Tabs Navigation -->
                <div class="mb-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex flex-wrap justify-center gap-2 bg-white rounded-2xl shadow-md p-2 border border-gray-100">
                        <button onclick="switchTab('publikasi')" 
                                id="tab-publikasi"
                                class="tab-button active px-6 py-3 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-2">
                            <i class="fas fa-book"></i>
                            <span>Publikasi</span>
                            <span class="tab-count bg-white/30 px-2 py-0.5 rounded-full text-xs font-bold">
                                <?= count($publications); ?>
                            </span>
                        </button>
                        <button onclick="switchTab('riset')" 
                                id="tab-riset"
                                class="tab-button px-6 py-3 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-2">
                            <i class="fas fa-flask"></i>
                            <span>Riset</span>
                            <span class="tab-count bg-gray-200 px-2 py-0.5 rounded-full text-xs font-bold"><?= count($riset); ?></span>
                        </button>
                        <button onclick="switchTab('kekayaan')" 
                                id="tab-kekayaan"
                                class="tab-button px-6 py-3 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-2">
                            <i class="fas fa-certificate"></i>
                            <span>Kekayaan Intelektual</span>
                            <span class="tab-count bg-gray-200 px-2 py-0.5 rounded-full text-xs font-bold"><?= count($kekayaan); ?></span>
                        </button>
                        <button onclick="switchTab('ppm')" 
                                id="tab-ppm"
                                class="tab-button px-6 py-3 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-2">
                            <i class="fas fa-hands-helping"></i>
                            <span>PPM</span>
                            <span class="tab-count bg-gray-200 px-2 py-0.5 rounded-full text-xs font-bold"><?= count($ppm); ?></span>
                        </button>
                        <button onclick="switchTab('aktivitas')" 
                                id="tab-aktivitas"
                                class="tab-button px-6 py-3 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-2">
                            <i class="fas fa-calendar-check"></i>
                            <span>Aktivitas</span>
                            <span class="tab-count bg-gray-200 px-2 py-0.5 rounded-full text-xs font-bold"><?= count($aktivitas); ?></span>
                        </button>
                    </div>
                </div>

                <!-- Tab Content: Publikasi -->
                <div id="content-publikasi" class="tab-content active" data-aos="fade-up" data-aos-delay="200">
                    <?php if (!empty($publications) && count($publications) > 0): ?>
                        <!-- Table View -->
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                            <!-- Table Header -->
                            <div class="bg-gradient-to-r from-[var(--blue)] to-[var(--blue-dark)] px-6 py-4">
                                <div class="flex items-center justify-between text-white">
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-book-open text-xl"></i>
                                        <h3 class="text-xl font-bold">Daftar Publikasi</h3>
                                    </div>
                                    <div class="text-sm font-medium bg-white/20 px-4 py-1 rounded-full backdrop-blur-sm">
                                        Showing 1 to <?= min(10, count($publications)); ?> of <?= count($publications); ?> entries
                                    </div>
                                </div>
                            </div>

                            <!-- Table -->
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                                        <tr>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider w-16">
                                                NO
                                            </th>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                JUDUL
                                            </th>
                                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider w-24">
                                                TAHUN
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php 
                                        $no = 1;
                                        foreach ($publications as $pub): ?>
                                            <tr class="hover:bg-blue-50 transition-colors duration-200 group">
                                                <td class="px-6 py-4 text-sm text-gray-900 font-medium">
                                                    <?= $no++; ?>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex flex-col gap-1">
                                                        <div class="text-sm font-semibold text-gray-900 group-hover:text-[var(--blue)] transition-colors">
                                                            <?= htmlspecialchars($pub['judul']); ?>
                                                        </div>
                                                        <?php if (!empty($pub['deskripsi'])): ?>
                                                            <div class="text-xs text-gray-500 line-clamp-2">
                                                                <?= htmlspecialchars($pub['deskripsi']); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (!empty($pub['link_jurnal'])): ?>
                                                            <a href="<?= htmlspecialchars($pub['link_jurnal']); ?>" 
                                                               target="_blank"
                                                               class="text-xs text-[var(--blue)] hover:text-[var(--blue-dark)] font-medium inline-flex items-center gap-1 mt-1 w-fit">
                                                                <i class="fas fa-external-link-alt"></i>
                                                                <span>View Publication</span>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    <span class="inline-block bg-gradient-to-r from-[var(--blue-light)] to-[var(--blue)] text-white px-3 py-1 rounded-full text-xs font-bold">
                                                        <?= htmlspecialchars($pub['tahun'] ?? 'N/A'); ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Table Footer -->
                            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div class="text-sm text-gray-600">
                                        Total: <span class="font-bold text-[var(--blue)]"><?= count($publications); ?></span> publications
                                    </div>
                                    <!-- Pagination would go here if needed -->
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="bg-white rounded-2xl shadow-lg p-16 text-center border border-gray-100">
                            <i class="fas fa-book text-6xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500 text-lg font-medium">No publications available yet</p>
                            <p class="text-gray-400 text-sm mt-2">Check back later for updates</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Tab Content: Riset -->
                <div id="content-riset" class="tab-content hidden">
                    <?php if (!empty($riset) && count($riset) > 0): ?>
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                            <div class="bg-gradient-to-r from-purple-500 to-purple-700 px-6 py-4">
                                <div class="flex items-center justify-between text-white">
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-flask text-xl"></i>
                                        <h3 class="text-xl font-bold">Daftar Riset</h3>
                                    </div>
                                    <div class="text-sm font-medium bg-white/20 px-4 py-1 rounded-full backdrop-blur-sm">
                                        Total: <?= count($riset); ?> entries
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                                        <tr>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider w-16">NO</th>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">JUDUL</th>
                                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider w-32">TAHUN</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php $no = 1; foreach ($riset as $r): ?>
                                            <tr class="hover:bg-purple-50 transition-colors duration-200">
                                                <td class="px-6 py-4 text-sm text-gray-900 font-medium"><?= $no++; ?></td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm font-semibold text-gray-900"><?= htmlspecialchars($r['judul']); ?></div>
                                                    <?php if (!empty($r['deskripsi'])): ?>
                                                        <div class="text-xs text-gray-500 mt-1 line-clamp-2"><?= htmlspecialchars($r['deskripsi']); ?></div>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    <span class="inline-block bg-gradient-to-r from-purple-400 to-purple-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                                                        <?= htmlspecialchars($r['tahun'] ?? 'N/A'); ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="bg-white rounded-2xl shadow-lg p-16 text-center border border-gray-100">
                            <i class="fas fa-flask text-6xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500 text-lg font-medium">No research data available</p>
                            <p class="text-gray-400 text-sm mt-2">Research information will be displayed here</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Tab Content: Kekayaan Intelektual -->
                <div id="content-kekayaan" class="tab-content hidden">
                    <?php if (!empty($kekayaan) && count($kekayaan) > 0): ?>
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                            <div class="bg-gradient-to-r from-amber-500 to-orange-600 px-6 py-4">
                                <div class="flex items-center justify-between text-white">
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-certificate text-xl"></i>
                                        <h3 class="text-xl font-bold">Daftar Kekayaan Intelektual</h3>
                                    </div>
                                    <div class="text-sm font-medium bg-white/20 px-4 py-1 rounded-full backdrop-blur-sm">
                                        Total: <?= count($kekayaan); ?> entries
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                                        <tr>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider w-16">NO</th>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">JUDUL</th>
                                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider w-24">JENIS</th>
                                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider w-32">TAHUN</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php $no = 1; foreach ($kekayaan as $k): ?>
                                            <tr class="hover:bg-orange-50 transition-colors duration-200">
                                                <td class="px-6 py-4 text-sm text-gray-900 font-medium"><?= $no++; ?></td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm font-semibold text-gray-900"><?= htmlspecialchars($k['judul']); ?></div>
                                                    <?php if (!empty($k['deskripsi'])): ?>
                                                        <div class="text-xs text-gray-500 mt-1 line-clamp-2"><?= htmlspecialchars($k['deskripsi']); ?></div>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    <span class="inline-block bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-bold">
                                                        <?= htmlspecialchars($k['jenis'] ?? 'N/A'); ?>
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    <span class="inline-block bg-gradient-to-r from-amber-400 to-orange-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                                        <?= htmlspecialchars($k['tahun'] ?? 'N/A'); ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="bg-white rounded-2xl shadow-lg p-16 text-center border border-gray-100">
                            <i class="fas fa-certificate text-6xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500 text-lg font-medium">No intellectual property data available</p>
                            <p class="text-gray-400 text-sm mt-2">Patents and intellectual property will be displayed here</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Tab Content: PPM -->
                <div id="content-ppm" class="tab-content hidden">
                    <?php if (!empty($ppm) && count($ppm) > 0): ?>
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                            <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-6 py-4">
                                <div class="flex items-center justify-between text-white">
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-hands-helping text-xl"></i>
                                        <h3 class="text-xl font-bold">Daftar Pengabdian Masyarakat</h3>
                                    </div>
                                    <div class="text-sm font-medium bg-white/20 px-4 py-1 rounded-full backdrop-blur-sm">
                                        Total: <?= count($ppm); ?> entries
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                                        <tr>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider w-16">NO</th>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">JUDUL</th>
                                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider w-32">TAHUN</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php $no = 1; foreach ($ppm as $p): ?>
                                            <tr class="hover:bg-green-50 transition-colors duration-200">
                                                <td class="px-6 py-4 text-sm text-gray-900 font-medium"><?= $no++; ?></td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm font-semibold text-gray-900"><?= htmlspecialchars($p['judul']); ?></div>
                                                    <?php if (!empty($p['deskripsi'])): ?>
                                                        <div class="text-xs text-gray-500 mt-1 line-clamp-2"><?= htmlspecialchars($p['deskripsi']); ?></div>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    <span class="inline-block bg-gradient-to-r from-green-400 to-emerald-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                                        <?= htmlspecialchars($p['tahun'] ?? 'N/A'); ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="bg-white rounded-2xl shadow-lg p-16 text-center border border-gray-100">
                            <i class="fas fa-hands-helping text-6xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500 text-lg font-medium">No community service data available</p>
                            <p class="text-gray-400 text-sm mt-2">Community service activities will be displayed here</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Tab Content: Aktivitas -->
                <div id="content-aktivitas" class="tab-content hidden">
                    <?php if (!empty($aktivitas) && count($aktivitas) > 0): ?>
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                            <div class="bg-gradient-to-r from-pink-500 to-rose-600 px-6 py-4">
                                <div class="flex items-center justify-between text-white">
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-calendar-check text-xl"></i>
                                        <h3 class="text-xl font-bold">Daftar Aktivitas</h3>
                                    </div>
                                    <div class="text-sm font-medium bg-white/20 px-4 py-1 rounded-full backdrop-blur-sm">
                                        Total: <?= count($aktivitas); ?> entries
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                                        <tr>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider w-16">NO</th>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">AKTIVITAS</th>
                                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider w-32">TANGGAL</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php $no = 1; foreach ($aktivitas as $a): ?>
                                            <tr class="hover:bg-pink-50 transition-colors duration-200">
                                                <td class="px-6 py-4 text-sm text-gray-900 font-medium"><?= $no++; ?></td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm font-semibold text-gray-900"><?= htmlspecialchars($a['judul'] ?? $a['nama_aktivitas'] ?? 'N/A'); ?></div>
                                                    <?php if (!empty($a['deskripsi'])): ?>
                                                        <div class="text-xs text-gray-500 mt-1 line-clamp-2"><?= htmlspecialchars($a['deskripsi']); ?></div>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    <span class="inline-block bg-gradient-to-r from-pink-400 to-rose-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                                        <?= !empty($a['tanggal']) ? date('d M Y', strtotime($a['tanggal'])) : 'N/A'; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="bg-white rounded-2xl shadow-lg p-16 text-center border border-gray-100">
                            <i class="fas fa-calendar-check text-6xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500 text-lg font-medium">No activity data available</p>
                            <p class="text-gray-400 text-sm mt-2">Recent activities and events will be displayed here</p>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>

    <!-- Bottom Blur Effect -->
    <div class="bottom-blur-overlay"></div>

    <style>
        /* Tab Styles */
        .tab-button {
            background: transparent;
            color: #64748b;
            border: none;
            cursor: pointer;
            white-space: nowrap;
        }

        .tab-button:hover {
            background: #f1f5f9;
            color: #334155;
        }

        .tab-button.active {
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dark) 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(6, 182, 212, 0.3);
        }

        .tab-button.active .tab-count {
            background: rgba(255, 255, 255, 0.3);
            color: white;
        }

        .tab-content {
            display: none;
            animation: fadeIn 0.5s ease-in-out;
        }

        .tab-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive table */
        @media (max-width: 768px) {
            .tab-button span:not(.tab-count) {
                display: none;
            }
            
            .tab-button {
                padding: 0.75rem;
            }

            table {
                font-size: 0.875rem;
            }

            th, td {
                padding: 0.75rem 0.5rem !important;
            }
        }

        /* Line clamp utility */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: false,
            duration: 1000,
            easing: 'ease-out',
            offset: 100,
        });

        // Tab Switching Function
        function switchTab(tabName) {
            // Hide all tab contents
            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => {
                content.classList.remove('active');
            });

            // Remove active class from all buttons
            const buttons = document.querySelectorAll('.tab-button');
            buttons.forEach(button => {
                button.classList.remove('active');
            });

            // Show selected tab content
            const selectedContent = document.getElementById(`content-${tabName}`);
            if (selectedContent) {
                selectedContent.classList.add('active');
            }

            // Add active class to selected button
            const selectedButton = document.getElementById(`tab-${tabName}`);
            if (selectedButton) {
                selectedButton.classList.add('active');
            }
        }

        // Bottom blur visibility control
        const bottomBlur = document.querySelector('.bottom-blur-overlay');
        const footer = document.querySelector('.target-hidden');
        const blurHeight = bottomBlur ? bottomBlur.offsetHeight : 0;

        if (bottomBlur && footer) {
            function checkVisibility() {
                const footerRect = footer.getBoundingClientRect();
                if (footerRect.top <= (window.innerHeight - blurHeight)) {
                    bottomBlur.classList.add('is-hidden');
                } else {
                    bottomBlur.classList.remove('is-hidden');
                }
            }

            window.addEventListener('scroll', checkVisibility);
            window.addEventListener('resize', checkVisibility);
            checkVisibility();
        }
    </script>
</body>
</html>
