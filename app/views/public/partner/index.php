<?php
// Group partners by category
$groupedPartners = [];
foreach ($partners as $partner) {
    $groupedPartners[$partner['kategori']][] = $partner;
}
?>

<!-- ini bagian websitenya -->
   <section class="partner-hero">
        <!-- Floating Icons -->
        <i class="fas fa-handshake floating-icon" style="font-size: 3rem;"></i>
        <i class="fas fa-globe floating-icon" style="font-size: 2.5rem;"></i>
        <i class="fas fa-building floating-icon" style="font-size: 3rem;"></i>
        <i class="fas fa-award floating-icon" style="font-size: 2.5rem;"></i>

        <div class="partner-hero-content">
            <h1>PARTNERS</h1>
            <p class="partner-hero-subtitle">Building Bridges, Creating Opportunities</p>
            <p class="partner-hero-description">
                The Postgraduate Department of Information Technology at Malang State Polytechnic collaborates with various strategic partners, 
                including industry, academia, and the community, to enhance the quality of learning. This collaboration provides a relevant, 
                applicable learning experience that is oriented toward developing student competencies in line with the needs of the digital era and Industry 4.0.
            </p>

            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number"><?= count($partners) ?>+</span>
                    <span class="stat-label">Partners</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number"><?= count($groupedPartners) ?></span>
                    <span class="stat-label">Categories</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">10+</span>
                    <span class="stat-label">Years Collaboration</span>
                </div>
            </div>
        </div>
    </section>

    <section class="partners-section">
        <div class="container">
            <?php foreach ($groupedPartners as $kategori => $categoryPartners): ?>
                <div class="partner-category-section" data-aos="fade-up">
                    <h2 class="partner-category-title"><?= htmlspecialchars($kategori) ?></h2>
                    <p class="partner-category-subtitle">
                        <?php
                        $subtitles = [
                            'Industry Partner' => 'Leading technology companies and innovative startups driving digital transformation',
                            'Educational Institutions' => 'Prestigious universities and academic institutions fostering knowledge exchange',
                            'International Institutions' => 'Global partners expanding our reach and research capabilities',
                            'Government Institutions' => 'Public sector organizations supporting community development and innovation'
                        ];
                        echo $subtitles[$kategori] ?? 'Trusted partners supporting our mission and vision';
                        ?>
                    </p>
                    
                    <div class="partners-grid">
                        <?php foreach ($categoryPartners as $partner): ?>
                            <div class="partner-card" data-aos="zoom-in" data-aos-delay="100">
                                <div class="partner-card-inner">
                                    <div class="partner-logo-container">
                                        <img src="<?= htmlspecialchars($partner['logo']) ?>" 
                                             alt="<?= htmlspecialchars($partner['nama']) ?>"
                                             class="partner-logo">
                                    </div>
                                    <div class="partner-info">
                                        <h3 class="partner-name"><?= htmlspecialchars($partner['nama']) ?></h3>
                                        <p class="partner-description"><?= htmlspecialchars($partner['deskripsi']) ?></p>
                                        <?php if (!empty($partner['website']) && $partner['website'] !== '#'): ?>
                                            <a href="<?= htmlspecialchars($partner['website']) ?>" 
                                               target="_blank" 
                                               class="partner-link">
                                                <i class="fas fa-external-link-alt"></i> Visit Website
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>