    <section class="contact-hero">
        <!-- Floating Icons -->
        <i class="fas fa-envelope floating-icon" style="font-size: 3rem;"></i>
        <i class="fas fa-phone-alt floating-icon" style="font-size: 2.5rem;"></i>
        <i class="fas fa-map-marker-alt floating-icon" style="font-size: 3rem;"></i>
        <i class="fas fa-comments floating-icon" style="font-size: 2.5rem;"></i>

        <div class="contact-hero-content">
            <h1>Contact Lab</h1>
            <p class="contact-hero-subtitle">Let's Start a Conversation</p>
            <p class="contact-hero-description">
                For more information, please visit our laboratory. We're here to answer your questions, 
                discuss collaboration opportunities, or provide information about our research and services.
            </p>
        </div>
    </section>

    <div class="shadow-bar-top">
        <div class="half-circle-glow"></div>
    </div>

    <section class="contact-section">
        <div class="container">
            <!-- Contact Info Cards -->
            <div class="contact-info-grid" data-aos="fade-up">
                <div class="contact-info-card" data-aos="zoom-in" data-aos-delay="100">
                    <div class="contact-icon-wrapper">
                        <i class="fas fa-map-marker-alt contact-icon"></i>
                    </div>
                    <h3 class="contact-info-title">Applied Information Laboratory</h3>
                    <p class="contact-info-text">
                        2nd Floor of the Postgraduate Building of<br>
                        Malang State Polytechnic
                    </p>
                </div>

                <div class="contact-info-card" data-aos="zoom-in" data-aos-delay="200">
                    <div class="contact-icon-wrapper">
                        <i class="fas fa-clock contact-icon"></i>
                    </div>
                    <h3 class="contact-info-title">Operating Hours</h3>
                    <p class="contact-info-text">
                        Monday to Friday<br>
                        08.00 am - 16.00 pm
                    </p>
                </div>

                <div class="contact-info-card" data-aos="zoom-in" data-aos-delay="300">
                    <div class="contact-icon-wrapper">
                        <i class="fas fa-envelope contact-icon"></i>
                    </div>
                    <h3 class="contact-info-title">Email</h3>
                    <p class="contact-info-text">
                        <a href="mailto:email@labai.polinema.ac.id" class="contact-email-link">
                            email@labai.polinema.ac.id
                        </a>
                    </p>
                </div>
            </div>
            
            <!-- Contact Form Section -->
            <div class="contact-form-wrapper" data-aos="fade-up" data-aos-delay="400">
                <div class="contact-form-header">
                    <div class="contact-form-icon">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <h2 class="contact-form-title">Contact Us</h2>
                    <p class="contact-form-subtitle">
                        Have a question or want to work together? Fill out the form below and we'll get back to you as soon as possible.
                    </p>
                </div>
                <?php if (isset($_SESSION['success'])): ?>
                    <style>
                        /* Definisi Animasi */
                        @keyframes fadeOutCSS {
                            0% { opacity: 1; visibility: visible; }
                            80% { opacity: 1; visibility: visible; } /* Tahan di layar sampai 80% durasi */
                            100% { opacity: 0; visibility: hidden; display: none; } /* Hilang */
                        }
                        
                        #success-alert {
                            /* Jalankan animasi selama 5 detik, lalu tahan di posisi terakhir (forwards) */
                            animation: fadeOutCSS 5s forwards;
                        }
                    </style>

                    <div id="success-alert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="font-bold">Berhasil!</p>
                                <p><?= $_SESSION['success']; ?></p>
                            </div>
                        </div>
                    </div>

                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>
                <form class="contact-form" id="contactForm" action="/kontak/store" method="POST">
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="fas fa-user"></i> Name
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="nama" 
                            class="form-input" 
                            placeholder="Enter your full name"
                            maxlength="100"
                            required>
                        <small id="name-warning" class="text-gray-500 text-xs mt-1 block text-right transition-colors duration-200">
                            0/100 karakter
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i> Email
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="form-input" 
                            placeholder="Enter your email address"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="subject" class="form-label">
                            <i class="fas fa-tag"></i> Subject
                        </label>
                        <input 
                            type="text" 
                            id="subject" 
                            name="subject" 
                            class="form-input" 
                            placeholder="What is this about?"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label">
                            <i class="fas fa-comment-dots"></i> Message
                        </label>
                        <textarea 
                            id="message" 
                            name="isi" 
                            class="form-textarea" 
                            rows="6" 
                            placeholder="Write your message here..."
                            required></textarea>
                    </div>

                    <button type="submit" class="form-submit-btn">
                        <i class="fas fa-paper-plane"></i>
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Map Section -->
            <div class="contact-map-section" data-aos="fade-up" data-aos-delay="500">
                <h2 class="map-title">Find Us Here</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-center mb-6">
                    <i class="fa-solid fa-location-dot text-red-500 mr-2"></i>
                    Gedung Pascasarjana POLINEMA, Jl. Simpang Remujung, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141
                </p>
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d987.8848788774824!2d112.61313139492822!3d-7.943064517393075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78833cae0fc99f%3A0x20d162669317de31!2sGedung%20Pascasarjana%20POLINEMA!5e0!3m2!1sid!2sid!4v1764426059299!5m2!1sid!2sid" 
                        class="map-iframe"
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>