<section id="projects" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="section-title">Proyek & Karya Kami</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($projects as $project): ?>
            <div class="project-card card-hover">
                <div class="h-48 hero-gradient relative overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center opacity-20">
                        <svg class="w-24 h-24" fill="none" stroke="white" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="badge"><?php echo htmlspecialchars($project['kategori']); ?></span>
                        <span class="text-sm text-gray-500"><?php echo htmlspecialchars($project['tahun']); ?></span>
                    </div>
                    <h3 class="text-xl font-bold mb-2"><?php echo htmlspecialchars($project['judul']); ?></h3>
                    <p class="text-gray-600 mb-4 text-sm"><?php echo htmlspecialchars($project['deskripsi']); ?></p>
                    <div class="mb-4 flex flex-wrap gap-1">
                        <?php foreach (explode(',', $project['teknologi']) as $tech): ?>
                        <span class="tech-tag"><?php echo htmlspecialchars(trim($tech)); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <button class="button-primary w-full">Lihat Proyek</button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>