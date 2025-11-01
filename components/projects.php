<section id="projects" class="py-20 bg-bg-light-custom">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="section-title text-center">Proyek & Karya Kami</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (count($projects) > 0): ?>
                <?php foreach ($projects as $project): ?>
                <div class="project-card card-hover">
                    <div class="h-48 relative overflow-hidden flex items-center justify-center border-b border-border-custom bg-gray-800">
                        <?php if (!empty($project['gambar_url'])): ?>
                            <img src="<?php echo htmlspecialchars($project['gambar_url']); ?>" alt="<?php echo htmlspecialchars($project['judul']); ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <div class="text-secondary-color/50">
                                <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="badge"><?php echo htmlspecialchars($project['kategori']); ?></span>
                            <span class="text-sm text-text-light-custom"><?php echo htmlspecialchars($project['tahun']); ?></span>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-white"><?php echo htmlspecialchars($project['judul']); ?></h3>
                        <p class="text-text-light-custom mb-4 text-sm line-clamp-3"><?php echo htmlspecialchars($project['deskripsi']); ?></p>
                        <div class="mb-4 flex flex-wrap gap-1">
                            <?php 
                            $teknologi = $project['teknologi'] ?? '';
                            if (!empty($teknologi)) {
                                foreach (explode(',', $teknologi) as $tech): ?>
                                <span class="tech-tag"><?php echo htmlspecialchars(trim($tech)); ?></span>
                            <?php 
                                endforeach;
                            }
                            ?>
                        </div>
                        <a href="<?php echo htmlspecialchars($project['url_demo'] ?? '#'); ?>" target="_blank" class="button-primary w-full text-center block">Lihat Proyek</a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="col-span-3 text-center text-text-light-custom">Belum ada data proyek yang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
</section>