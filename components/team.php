<section id="team" class="py-20 bg-bg-light-custom">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="section-title text-center">Tim Kami (Dosen)</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (count($team) > 0): ?>
                <?php foreach ($team as $member): ?>
                <div class="team-card card-hover">
                    <div class="w-28 h-28 mx-auto mb-4 rounded-full bg-border-custom flex items-center justify-center overflow-hidden border-4 border-secondary-light">
                        <?php if (!empty($member['foto_url'])): ?>
                            <img src="<?php echo htmlspecialchars($member['foto_url']); ?>" alt="<?php echo htmlspecialchars($member['nama']); ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <svg class="w-12 h-12 text-secondary-color" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                            </svg>
                        <?php endif; ?>
                    </div>
                    
                    <h3 class="text-xl font-bold mb-1 text-white"><?php echo htmlspecialchars($member['nama']); ?></h3>
                    <p class="text-sm mb-4 text-primary-color font-semibold">
                        <?php echo htmlspecialchars($member['keahlian']); ?>
                    </p>
                    <div class="mb-3">
                        <p class="text-xs text-text-light-custom italic line-clamp-2">
                             <?php echo htmlspecialchars($member['deskripsi'] ?? 'Deskripsi tidak tersedia.'); ?>
                        </p>
                    </div>
                    <p class="text-text-light-custom text-sm mb-1"><?php echo htmlspecialchars($member['email']); ?></p>
                    <p class="text-text-light-custom text-sm"><?php echo htmlspecialchars($member['no_telpon']); ?></p>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="col-span-3 text-center text-text-light-custom">Belum ada data tim (dosen) yang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
</section>