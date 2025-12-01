<?php
//    if (empty($partners)) {
//     $partners = [
//         // Industry Partners
//         ['nama' => 'ADS', 'kategori' => 'Industry Partner', 'logo' => 'img/partners/ads.png', 'website' => '#', 'description' => 'Technology Solutions'],
//         ['nama' => 'ARM Solusi', 'kategori' => 'Industry Partner', 'logo' => 'img/partners/arm.png', 'website' => '#', 'description' => 'Software Development'],
//         ['nama' => 'Bumaji Sejantera', 'kategori' => 'Industry Partner', 'logo' => 'img/partners/bumaji.png', 'website' => '#', 'description' => 'Agricultural Tech'],
//         ['nama' => 'DSG', 'kategori' => 'Industry Partner', 'logo' => 'img/partners/dsg.png', 'website' => '#', 'description' => 'Digital Solutions'],
//         ['nama' => 'PT Link Apisindo Media', 'kategori' => 'Industry Partner', 'logo' => 'img/partners/link.png', 'website' => '#', 'description' => 'Media & Tech'],
//         ['nama' => 'QuantumGrid', 'kategori' => 'Industry Partner', 'logo' => 'img/partners/quantum.png', 'website' => '#', 'description' => 'Cloud Services'],
//         ['nama' => 'Infonika Garasa', 'kategori' => 'Industry Partner', 'logo' => 'img/partners/infonika.png', 'website' => '#', 'description' => 'IT Infrastructure'],
//         ['nama' => 'Utcero Indonesia', 'kategori' => 'Industry Partner', 'logo' => 'img/partners/utcero.png', 'website' => '#', 'description' => 'Tech Innovation'],
//         ['nama' => 'Sekawan Media', 'kategori' => 'Industry Partner', 'logo' => 'img/partners/sekawan.png', 'website' => '#', 'description' => 'Digital Agency'],
//         ['nama' => 'Malang Creative Fusion', 'kategori' => 'Industry Partner', 'logo' => 'img/partners/mcf.png', 'website' => '#', 'description' => 'Creative Solutions'],
        
//         // Educational Institutions
//         ['nama' => 'INSTIKI', 'kategori' => 'Educational Institutions', 'logo' => 'img/partners/instiki.png', 'website' => '#', 'description' => 'Technology Institute'],
//         ['nama' => 'MCC', 'kategori' => 'Educational Institutions', 'logo' => 'img/partners/mcc.png', 'website' => '#', 'description' => 'Computing Center'],
//         ['nama' => 'UNESA', 'kategori' => 'Educational Institutions', 'logo' => 'img/partners/unesa.png', 'website' => '#', 'description' => 'State University'],
//         ['nama' => 'Politeknik Negeri Banyuwangi', 'kategori' => 'Educational Institutions', 'logo' => 'img/partners/polban.png', 'website' => '#', 'description' => 'Polytechnic'],
//         ['nama' => 'SMK Negeri 1', 'kategori' => 'Educational Institutions', 'logo' => 'img/partners/smk1.png', 'website' => '#', 'description' => 'Vocational School'],
//         ['nama' => 'UIN Malang', 'kategori' => 'Educational Institutions', 'logo' => 'img/partners/uin.png', 'website' => '#', 'description' => 'Islamic University'],
//         ['nama' => 'Politeknik Negeri Malang', 'kategori' => 'Educational Institutions', 'logo' => 'img/partners/polinema.png', 'website' => '#', 'description' => 'State Polytechnic'],
//         ['nama' => 'ASTRAtech', 'kategori' => 'Educational Institutions', 'logo' => 'img/partners/astra.png', 'website' => '#', 'description' => 'Technical School'],
        
//         // International Institutions
//         ['nama' => 'Duke University', 'kategori' => 'International Institutions', 'logo' => 'img/partners/duke.png', 'website' => '#', 'description' => 'USA University'],
//         ['nama' => 'Okayama University', 'kategori' => 'International Institutions', 'logo' => 'img/partners/okayama.png', 'website' => '#', 'description' => 'Japan University'],
        
//         // Government Institutions
//         ['nama' => 'DPUBM', 'kategori' => 'Government Institutions', 'logo' => 'img/partners/dpubm.png', 'website' => '#', 'description' => 'Public Works'],
//         ['nama' => 'Kota Batu', 'kategori' => 'Government Institutions', 'logo' => 'img/partners/batu.png', 'website' => '#', 'description' => 'City Government'],
//         ['nama' => 'BIN', 'kategori' => 'Government Institutions', 'logo' => 'img/partners/bin.png', 'website' => '#', 'description' => 'Intelligence Agency'],
//         ['nama' => 'Diskominfo Kota Batu', 'kategori' => 'Government Institutions', 'logo' => 'img/partners/diskominfo-batu.png', 'website' => '#', 'description' => 'Communication Office'],
//         ['nama' => 'Kominfo Jatim', 'kategori' => 'Government Institutions', 'logo' => 'img/partners/kominfo.png', 'website' => '#', 'description' => 'Regional Communication Office'],
//     ];
// }

// Group partners by category
$groupedPartners = [];
foreach ($partners as $partner) {
    $groupedPartners[$partner['category']][] = $partner;
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