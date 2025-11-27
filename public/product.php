<?php
include "../app/model/products.php"
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products - Lab AI Polinema</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/Style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <?php include '../app/views/components/header.php'; ?>

    <section class="product-hero">
        <!-- Floating Icons -->
        <i class="fas fa-rocket floating-icon" style="font-size: 3rem;"></i>
        <i class="fas fa-lightbulb floating-icon" style="font-size: 2.5rem;"></i>
        <i class="fas fa-code floating-icon" style="font-size: 3rem;"></i>
        <i class="fas fa-cogs floating-icon" style="font-size: 2.5rem;"></i>

        <div class="product-hero-content">
            <h1>Our Products</h1>
            <p class="product-hero-subtitle">Innovation Meets Excellence</p>
            <p class="product-hero-description">
                Discover our cutting-edge solutions crafted with passion and precision.
                From AI-powered platforms to blockchain innovations, we're transforming ideas into reality.
            </p>

            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">6+</span>
                    <span class="stat-label">Products</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">100+</span>
                    <span class="stat-label">Users</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">99%</span>
                    <span class="stat-label">Satisfaction</span>
                </div>
            </div>
        </div>
    </section>

    <div class="shadow-bar-top">
        <div class="half-circle-glow"></div>
    </div>

    <section class="products-section">
        <div class="container products-grid">
            <?php foreach ($products as $product): ?>
                <?php include('../app/views/components/product.php') ?>
            <?php endforeach; ?>
        </div>
    </section>

    <?php include '../app/views/components/footer.php'; ?>
</body>

</html>