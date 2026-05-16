// Swiper initialization for Book Slider (Optimized for Single View + Mobile Nav)
document.addEventListener('DOMContentLoaded', function() {
    if (typeof Swiper !== 'undefined') {
        const bookSwiper = new Swiper('.book-swiper', {
            // Default parameters (Mobile first)
            slidesPerView: 1,
            spaceBetween: 20,
            centeredSlides: true,
            loop: false,
            grabCursor: true,
            freeMode: false, // Snap to slides
            
            // Pagination
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // Responsive breakpoints
            breakpoints: {
                // Saat layar sangat kecil (di bawah 480px)
                0: {
                    slidesPerView: 1,
                    spaceBetween: 10
                },
                // Saat layar sedikit lebih lebar (sm mobile/tablet portrait)
                480: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                // Saat layar mendekati batas desktop (640px - 767px)
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                    centeredSlides: false
                }
            }
        });
    }
});
