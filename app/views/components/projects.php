<section id="projects" class="section">
    <div class="container">
        <h2 class="section-title">Featured Projects</h2>

        <div class="projects-grid">
            <?php if (count($projects) > 0): ?>
                <?php foreach ($projects as $project): ?>
                <div class="project-card">
                    <div class="project-image">
                        <?php if (!empty($project['gambar_url'])): ?>
                            <img src="<?php echo htmlspecialchars($project['gambar_url']); ?>" alt="<?php echo htmlspecialchars($project['judul']); ?>">
                        <?php else: ?>
                            <div class="project-icon-placeholder">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="project-content">
                        <div class="project-meta">
                            <span class="badge"><?php echo htmlspecialchars($project['kategori']); ?></span>
                            <span class="project-year"><?php echo htmlspecialchars($project['tahun']); ?></span>
                        </div>
                        <h3 class="project-title"><?php echo htmlspecialchars($project['judul']); ?></h3>
                        <p class="project-description"><?php echo htmlspecialchars($project['deskripsi']); ?></p>
                        <div class="project-tags-group">
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
                        <a href="<?php echo htmlspecialchars($project['url_demo'] ?? '#'); ?>" target="_blank" class="button-primary project-button-link">Lihat Proyek</a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="project-description" style="text-align: center; grid-column: 1 / -1;">Belum ada data proyek yang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
</section>