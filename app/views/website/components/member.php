<div class="shadow-bar-top">
<!-- Div untuk Glow Setengah Lingkaran -->
        <div class="half-circle-glow"></div>
    </div>
<section id="team" class="section">
    <div class="container">
        <div class="profile header">
            <div class="title">
            <!-- Ikon Grup Orang (SVG Inline) -->
                <i class="fas fa-cloud text-xs mr-2"></i> OUR PRODUCT
            </div>
            <p class="secondary-title">Get to Know <span>Us</span></p>
            <p class="text-center text-gray-500 mb-12">The most recent updates, all in one place.</p>
        </div>
        <div class="profile-grid">
            <?php if (count($team) > 0): ?>
                <?php foreach ($team as $dosen): ?>
                <div class="profile-card">
                    <div class="profile-info">
                        <h3 class="profile-name"><?= htmlspecialchars($dosen['nama']); ?></h3>

                        <div class="profile-expertise">
                            <?php 
                            // Akses kolom keahlian_text yang baru dibuat
                            $keahlian = $dosen['keahlian_text'] ?? '';
                            if (!empty($keahlian)) {
                                foreach (explode(',', $keahlian) as $skill): ?>
                                <span class="skill-tag"><?= htmlspecialchars(trim($skill)); ?></span>
                            <?php endforeach; } ?>
                        </div>
                        
                        <div class="profile-description-container">
                            <p class="profile-description">
                                <?= htmlspecialchars($dosen['deskripsi'] ?? 'Deskripsi tidak tersedia.'); ?>
                            </p>
                        </div>
                        <p class="profile-contact" style="margin-bottom: 0.5rem;"><?= htmlspecialchars($dosen['email']); ?></p>
                    </div>

                    <div class="profile-image">
                        <?php if (empty($dosen['foto_profil'])): ?>
                            <img src="<?= htmlspecialchars($dosen['foto_profil']); ?>" alt="<?= htmlspecialchars($dosen['nama']); ?>">
                        <?php else: ?>
                            <div class="profile-photo-icon">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="profile-contact" style="text-align: center; grid-column: 1 / -1;">Belum ada data tim (dosen) yang tersedia.</p>
            <?php endif; ?>
        </div>
        <div class="flex justify-center mt-10">
            <button class="button-primary">
                Read more
            </button>
        </div>        
    </div>
</section>
<div class="shadow-bar-top">
<!-- Div untuk Glow Setengah Lingkaran -->
        <div class="half-circle-glow"></div>
    </div>