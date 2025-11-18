<div class="shadow-bar-top">
<!-- Div untuk Glow Setengah Lingkaran -->
        <div class="half-circle-glow"></div>
    </div>
<section id="products" class="section">
    <div class="container">
        <div class="project header">
            <div class="title">
            <!-- Ikon Grup Orang (SVG Inline) -->
                <i class="fas fa-cloud text-xs mr-2"></i> OUR CORE FOCUS
            </div>
            <p class="secondary-title">Get to Know <span>Us</span></p>
            <p class="text-center text-gray-500 mb-12">The most recent updates, all in one place.</p>
        </div>
        <div class="projects-grid">
            <?php if (count($projects) > 0): ?>
                <?php foreach ($projects as $product): ?>
                <div class="project-card">
                    <div class="project-image">
                        <?php if (!empty($product['image'])): ?>
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['nama_produk']); ?>">
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
                            <span class="badge"><?php echo htmlspecialchars($product['kategori']); ?></span>
                            </div>
                        <h3 class="project-title"><?php echo htmlspecialchars($product['nama_produk']); ?></h3>
                        <p class="project-description"><?php echo htmlspecialchars($product['deskripsi']); ?></p>
                        
                        <a href="<?php echo htmlspecialchars($product['link_demo'] ?? '#'); ?>" target="_blank" class="button-primary project-button-link">Lihat Demo</a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="project-description" style="text-align: center; grid-column: 1 / -1;">Belum ada data produk yang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
</section>