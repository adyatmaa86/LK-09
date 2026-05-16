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
                // when window width is >= 640px (sm)
                640: {
                    slidesPerView: 2,
                    centeredSlides: false,
                    spaceBetween: 20
                },
                // when window width is >= 1024px (lg)
                1024: {
                    slidesPerView: 3,
                    centeredSlides: false,
                    spaceBetween: 30
                },
                // when window width is >= 1280px (xl)
                1280: {
                    slidesPerView: 4,
                    centeredSlides: false,
                    spaceBetween: 30
                }
            }
        });
    }
});
