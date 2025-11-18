<div class="shadow-bar-top">
<!-- Div untuk Glow Setengah Lingkaran -->
        <div class="half-circle-glow"></div>
    </div>
<section id="team" class="section">
    <div class="container">
        <div class="team header">
            <div class="title">
            <!-- Ikon Grup Orang (SVG Inline) -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm8 2c-2.33 0-6.99 1.4-6.99 3.5V17h7.01v-0.5c0-2.1-4.67-3.5-7.01-3.5zm-8 0c-2.33 0-4.67 1.4-4.67 3.5V17h4.67c0-2.1 2.34-3.5 4.67-3.5z"/>
                </svg>
                    MEMBER
            </div>
            <p class="secondary-title">Get to Know <span>Us</span></p>
            <p class="text-center text-gray-500 mb-12">The most recent updates, all in one place.</p>
        </div>
        <div class="team-grid">
            <?php if (count($team) > 0): ?>
                <?php foreach ($team as $member): ?>
                <div class="team-card">
                    <div class="team-photo-wrapper">
                        <?php if (!empty($member['foto_profil'])): ?>
                            <img src="<?php echo htmlspecialchars($member['foto_profil']); ?>" alt="<?php echo htmlspecialchars($member['nama_dosen']); ?>">
                        <?php else: ?>
                            <div class="team-photo-icon">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <h3 class="team-name"><?php echo htmlspecialchars($member['nama_dosen']); ?></h3>
                    
                    <div class="team-expertise-tags">
                        <?php 
                        // Akses kolom keahlian_text yang baru dibuat
                        $keahlian = $member['keahlian_text'] ?? '';
                        if (!empty($keahlian)) {
                            foreach (explode(',', $keahlian) as $skill): ?>
                            <span class="skill-tag"><?php echo htmlspecialchars(trim($skill)); ?></span>
                        <?php endforeach; } ?>
                    </div>
                    
                    <div class="team-description-container">
                        <p class="team-description">
                             <?php echo htmlspecialchars($member['deskripsi'] ?? 'Deskripsi tidak tersedia.'); ?>
                        </p>
                    </div>
                    <p class="team-contact" style="margin-bottom: 0.5rem;"><?php echo htmlspecialchars($member['email']); ?></p>
                    <p class="team-contact"><?php echo htmlspecialchars($member['no_telepon'] ?? '-'); ?></p> 
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="team-contact" style="text-align: center; grid-column: 1 / -1;">Belum ada data tim (dosen) yang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<div class="shadow-bar-top">
<!-- Div untuk Glow Setengah Lingkaran -->
        <div class="half-circle-glow"></div>
    </div>