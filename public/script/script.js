$(document).ready(function() {
    
    // Hamburger Menu Logic
    $('.hamburger').on('click', function() {
        $(this).toggleClass('active');
        $('.nav-links').slideToggle(300);
    });

    // Close menu when link clicked (Mobile/Tablet only)
    $('.nav-links a').on('click', function() {
        if ($(window).width() <= 1024) { // Ubah 800 jadi 1024
            $('.nav-links').slideUp(300);
            $('.hamburger').removeClass('active');
        }
    });

    // Reset style on resize
    $(window).resize(function() {
        if ($(window).width() > 1024) { // Ubah 800 jadi 1024
            $('.nav-links').css('display', ''); 
            $('.hamburger').removeClass('active');
        }
    });
    
});

// Header hide on scroll
let lastScrollY = 100;
$(document).ready(()=>{
    $(window).on("scroll",()=>{
        console.log(window.scrollY);
        if(lastScrollY < window.scrollY){
            // scroll down
            $(".header").addClass("translate-y-[-100%]");
        } else {
            // scroll up
            $(".header").removeClass("translate-y-[-100%]");
        }
        lastScrollY = window.scrollY;
    })
});

// Back to Top Button
$(document).ready(()=>{
    const backToTopBtn = document.getElementById('backToTop');
    if (backToTopBtn) {
        // Event saat di-scroll
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) { // Muncul setelah scroll 300px
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        });

        // Event saat diklik (Smooth Scroll ke atas)
        backToTopBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
            });
        });
    }
});

//   AOS.init();
  AOS.init({
    once: false,
    duration: 1500, // Durasi animasi 1 detik
    easing: 'ease-out',
    offset: 0,    // Jarak trigger dari bawah layar
  });
  
    // Dapatkan elemen yang dibutuhkan
const bottomBlur = document.querySelector('.bottom-blur-overlay');
const footer = document.querySelector('.target-hidden'); // Asumsi elemen footer Anda menggunakan tag <footer>
const blurHeight = bottomBlur ? bottomBlur.offsetHeight : 0; // Tinggi blur (2rem)

if (bottomBlur && footer) {
    
    // Fungsi untuk memeriksa posisi
    function checkVisibility() {
        // Mendapatkan posisi footer relatif terhadap viewport
        const footerRect = footer.getBoundingClientRect();

        // Kondisi: Apakah bagian atas footer (footerRect.top)
        // sudah berada di atas posisi "bottom of the viewport MINUS tinggi blur"?
        // Jika footer sudah "naik" melewati batas blur, sembunyikan blur.
        if (footerRect.top <= (window.innerHeight - blurHeight)) {
            // Sembunyikan blur saat footer mulai menyentuh area blur
            bottomBlur.classList.add('is-hidden');
        } else {
            // Tampilkan kembali blur saat footer sudah jauh di bawah
            bottomBlur.classList.remove('is-hidden');
        }
    }

    // Panggil saat scroll dan saat halaman dimuat
    window.addEventListener('scroll', checkVisibility);
    window.addEventListener('resize', checkVisibility);
    checkVisibility(); // Panggil sekali saat dimuat
} else {
    console.error("Elemen '.bottom-blur-overlay' atau 'footer' tidak ditemukan.");
}


// GALLERY FILTER FUNCTIONALITY
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    if (filterBtns.length > 0 && galleryItems.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Get filter value
                const filterValue = this.getAttribute('data-filter');
                
                // Filter gallery items
                galleryItems.forEach(item => {
                    const itemCategory = item.getAttribute('data-category');
                    
                    if (filterValue === 'all' || itemCategory === filterValue) {
                        item.style.display = 'block';
                        // Add fade-in animation
                        item.style.animation = 'fadeIn 0.5s ease-in';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    }
});

// Add CSS animation keyframe if not already defined
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`;
document.head.appendChild(style);