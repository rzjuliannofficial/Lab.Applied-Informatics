<div class="product-card">
    <div class="product-logo-container">
        <img src="<?= htmlspecialchars($product['image']) ?>"
            alt="<?= htmlspecialchars($product['nama_produk']) ?>">
    </div>

    <div class="product-content">
        <span class="category"><?= htmlspecialchars($product['kategori']); ?></span>

        <h3 class="product-name"><?= htmlspecialchars($product['nama_produk']); ?></h3>
        <p class="product-description"><?= htmlspecialchars($product['deskripsi']); ?></p>
        <div class="product-footer">
            <a href="<?= htmlspecialchars($product['link_demo']) ?>"
                class="product-link"
                target="_blank">
                View Demo
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>