<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Lab AI Polinema</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/Style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <?php include '../app/views/components/header.php'; ?>

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

                <form class="contact-form" id="contactForm">
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="fas fa-user"></i> Name
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            class="form-input" 
                            placeholder="Enter your full name"
                            required>
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
                            name="message" 
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
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.4449889274456!2d112.61265931477678!3d-7.944473794290169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629916a860195%3A0x8d8eaa6f3c7a5e0b!2sPoliteknik%20Negeri%20Malang!5e0!3m2!1sen!2sid!4v1637841234567!5m2!1sen!2sid" 
                        class="map-iframe"
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <?php include '../app/views/components/footer.php'; ?>
    <div class="bottom-blur-overlay"></div>
</body>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        once: false,
        duration: 1000,
        easing: 'ease-out',
        offset: 100,
    });
</script>

<script>
    const bottomBlur = document.querySelector('.bottom-blur-overlay');
    const footer = document.querySelector('.target-hidden');
    const blurHeight = bottomBlur ? bottomBlur.offsetHeight : 0;

    if (bottomBlur && footer) {
        function checkVisibility() {
            const footerRect = footer.getBoundingClientRect();
            if (footerRect.top <= (window.innerHeight - blurHeight)) {
                bottomBlur.classList.add('is-hidden');
            } else {
                bottomBlur.classList.remove('is-hidden');
            }
        }

        window.addEventListener('scroll', checkVisibility);
        window.addEventListener('resize', checkVisibility);
        checkVisibility();
    }

    // Form submission handling
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(this);
        
        // Here you can add AJAX call to submit form
        // For now, just show success message
        alert('Thank you for your message! We will get back to you soon.');
        this.reset();
    });
</script>

</html>
