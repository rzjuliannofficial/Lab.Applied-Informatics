<section id="team" class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="section-title">Tim Kami</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($team as $member): ?>
            <div class="team-card card-hover">
                <div class="w-20 h-20 mx-auto mb-4 rounded-full hero-gradient flex items-center justify-center">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-1"><?php echo htmlspecialchars($member['nama']); ?></h3>
                <p class="text-sm mb-4" style="color: var(--primary); font-weight: 600;">
                    <?php echo htmlspecialchars($member['keahlian']); ?>
                </p>
                <p class="text-gray-600 text-sm mb-3"><?php echo htmlspecialchars($member['email']); ?></p>
                <p class="text-gray-600 text-sm"><?php echo htmlspecialchars($member['no_telpon']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
