<section id="team" class="section">
    <div class="container">
        <h2 class="section-title">Tim Kami (Dosen)</h2>

        <div class="team-grid">
            <?php if (count($team) > 0): ?>
                <?php foreach ($team as $member): ?>
                <div class="team-card">
                    <div class="team-photo-wrapper">
                        <?php if (!empty($member['foto_url'])): ?>
                            <img src="<?php echo htmlspecialchars($member['foto_url']); ?>" alt="<?php echo htmlspecialchars($member['nama']); ?>">
                        <?php else: ?>
                            <div class="team-photo-icon">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <h3 class="team-name"><?php echo htmlspecialchars($member['nama']); ?></h3>
                    <p class="team-expertise">
                        <?php echo htmlspecialchars($member['keahlian']); ?>
                    </p>
                    <div class="team-description-container">
                        <p class="team-description">
                             <?php echo htmlspecialchars($member['deskripsi'] ?? 'Deskripsi tidak tersedia.'); ?>
                        </p>
                    </div>
                    <p class="team-contact" style="margin-bottom: 0.5rem;"><?php echo htmlspecialchars($member['email']); ?></p>
                    <p class="team-contact"><?php echo htmlspecialchars($member['no_telpon']); ?></p>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="team-contact" style="text-align: center; grid-column: 1 / -1;">Belum ada data tim (dosen) yang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
</section>