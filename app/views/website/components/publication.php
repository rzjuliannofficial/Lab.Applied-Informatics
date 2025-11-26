<?php if (!isset($publications)) { $publications = []; } ?>

<section id="publication" class="section">
    <div class="container">
        <div class="product header">
            <div class="title">
                <i class="fas fa-file-alt text-xs mr-2"></i> PUBLICATION
            </div>
            <p class="secondary-title">Latest <span>Research</span></p>
        </div>

        <div class="products-grid">
            <?php if (count($publications) > 0): ?>
                <?php foreach ($publications as $p): ?>
                    <div class="product-card">

                        <div class="product-content">
                            <span class="category"><?= htmlspecialchars($p['kategori']); ?></span>

                            <h3 class="product-name"><?= htmlspecialchars($p['judul']); ?></h3>
                            <p class="product-description"><?= htmlspecialchars($p['deskripsi']); ?></p>

                            <div class="product-footer">
                                <a href="uploads/publikasi/<?= htmlspecialchars($p['file_dokumen']); ?>" 
                                   class="product-link" target="_blank">
                                    View Document
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-gray-500" style="grid-column: 1 / -1;">
                    Belum ada publikasi.
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>
