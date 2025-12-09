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

//for NEWS IN HOMEPAGE
$(document).ready(function() {
    const $items = $('.carousel-item-3d');
    const $btnNext = $('#btnNext');
    const $btnPrev = $('#btnPrev');
    const totalItems = $items.length;
    let currentIndex = 0;
    const autoSlideInterval = 5000;

    function updateCarousel() {
        $items.removeClass('active prev next hidden');
        
        $items.each(function(index) {
            const $item = $(this);
            let relativePosition = index - currentIndex;

            if (relativePosition < 0) {
                relativePosition += totalItems;
            }
            
            if (relativePosition === 0) {
                $item.addClass('active');
            } else if (relativePosition === 1) {
                $item.addClass('next');
            } else if (relativePosition === totalItems - 1) {
                $item.addClass('prev');
            } else {
                $item.addClass('hidden');
            }
        });
    }
    
    function goToSlide(direction) {
        if (direction === 'next') {
            currentIndex = (currentIndex + 1) % totalItems;
        } else {
            currentIndex = (currentIndex - 1 + totalItems) % totalItems;
        }
        updateCarousel();
    }

    $btnNext.on('click', function() {
        goToSlide('next');
    });
    $btnPrev.on('click', function() {
        goToSlide('prev');
    });
    
    $items.on('click', function() {
        const $clickedItem = $(this);
        const itemIndex = parseInt($clickedItem.data('index'));
        
        if (itemIndex !== currentIndex) {
            const nextIndex = (currentIndex + 1) % totalItems;
            
            if (itemIndex === nextIndex) {
                goToSlide('next');
            } else {
                goToSlide('prev');
            }
        }
    });

    updateCarousel();

    setInterval(() => {
        goToSlide('next');
    }, autoSlideInterval);
});

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