document.addEventListener('DOMContentLoaded', () => {

    // --- Lenis Initialization for Smooth Scrolling ---
    const lenis = new Lenis({
        lerp: 0.1, // Smoothness control
        smoothWheel: true,
    });

    // --- GSAP ScrollTrigger ---
    gsap.registerPlugin(ScrollTrigger);

    // Sync Lenis with ScrollTrigger
    lenis.on('scroll', ScrollTrigger.update);

    // Synchronize Lenis with GSAP's internal ticker to avoid scroll pauses/jitter
    gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
    });

    // Disable GSAP's lag smoothing to prevent conflicts with Lenis
    gsap.ticker.lagSmoothing(0);

    // Navbar scroll effect
    const navbar = document.querySelector('.gs-navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Fade Up Animations for sections
    const fadeUpElements = document.querySelectorAll('.gs-fade-up');
    fadeUpElements.forEach((el) => {
        gsap.fromTo(el,
            { y: 50, opacity: 0 },
            {
                y: 0,
                opacity: 1,
                duration: 1.2,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: el,
                    start: "top 85%",
                    toggleActions: "play none none reverse"
                }
            }
        );
    });

    // Hero Image Parallax subtle effect
    gsap.to('.hero-bg', {
        yPercent: 20,
        ease: "none",
        scrollTrigger: {
            trigger: ".hero-section",
            start: "top top",
            end: "bottom top",
            scrub: true
        }
    });

    // --- Swiper.js Initialization ---
    const swiper = new Swiper('.procedures-swiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        grabCursor: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            // when window width is >= 768px
            768: {
                slidesPerView: 2,
                spaceBetween: 40
            },
            // when window width is >= 1024px
            1024: {
                slidesPerView: 3,
                spaceBetween: 50
            }
        }
    });

    // --- Swiper.js Initialization for Testimonials ---
    const testimonialsSwiper = new Swiper('.testimonials-swiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        grabCursor: true,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.testimonials-pagination',
            clickable: true,
        }
    });

});
