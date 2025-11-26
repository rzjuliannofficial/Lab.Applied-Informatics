<?php


if (!$products) {
    $products = [
        [
            'nama_produk' => 'AMATI',
            'deskripsi' => 'Automated Cyber Security Maturity Assessment - A comprehensive security assessment tool designed to evaluate and enhance organizational cybersecurity posture.',
            'kategori' => 'Security',
            'link_demo' => '#',
            'image' => 'img/amati.png'
        ],
        [
            'nama_produk' => 'SEALS',
            'deskripsi' => 'Smart Adaptive Learning System - An intelligent learning platform that adapts to individual student needs and learning patterns for optimal educational outcomes.',
            'kategori' => 'Education',
            'link_demo' => '#',
            'image' => 'img/seals.png'
        ],
        [
            'nama_produk' => 'Agrilink Vocpro',
            'deskripsi' => 'Agricultural Vocational Professional Platform - Connecting farmers with modern agricultural technologies and best practices through innovative digital solutions.',
            'kategori' => 'Agriculture',
            'link_demo' => '#',
            'image' => 'img/ijo-removebg-preview.png'
        ]
    ];
}

?>

<div class="shadow-bar-top">
<!-- Div untuk Glow Setengah Lingkaran -->
        <div class="half-circle-glow"></div>
    </div>
<section id="products" class="section">
    <div class="container">
        <div class="product header">
            <div class="title">
            <!-- Ikon Grup Orang (SVG Inline) -->
                <i class="fas fa-cloud text-xs mr-2"></i> OUR PRODUCT
            </div>
            <p class="secondary-title">Innovation Meet <span>Excellence</span></p>
            <p class="text-center text-gray-500 mb-12">The most recent updates, all in one place.</p>
        </div>

        <div class="products-grid">
            <?php if (count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
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
                <?php endforeach; ?>
            <?php else: ?>
                <p class="product-description" style="text-align: center; grid-column: 1 / -1;">Belum ada data produk yang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="flex justify-center">
        <button class="button-primary">
            Read more
        </button>
    </div>
</section>