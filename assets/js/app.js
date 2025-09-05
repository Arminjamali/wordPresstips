$ = jQuery.noConflict();

function updateSlideNumber(swiper) {
    // چون توی لوپ، ایندکس‌ها فرق دارن، realIndex امن‌تره
    const index = swiper.realIndex + 1;
    const formatted = index.toString().padStart(2, '0');
    document.getElementById('slide-number').textContent = formatted;
}

const swiperConfigs = [
    {
        selector: '.main-slider',
        options: {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 0,
            navigation: {nextEl: '.ms-next-btn', prevEl: '.ms-perv-btn'},
            autoplay: {delay: 3000},

            on: {
                init: function () {
                    updateSlideNumber(this);
                },
                slideChange: function () {
                    updateSlideNumber(this);
                }
            }
        }
    },
    {
        selector: '.testimonial-slider',
        options: {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 10,
            autoplay: {delay: 3000},
            pagination: {
                el: ".swiper-pagination",
            },
        }
    },
    {
        selector: '.product-slider',
        options: {
            loop: true,
            freeMode: true,
            autoplay: {delay: 5000},
            navigation: {nextEl: '.products .slide-next', prevEl: '.products .slide-perv'},

            breakpoints: {
                150: {slidesPerView: 1, spaceBetween: 10},
                768: {slidesPerView: 2, spaceBetween: 10},
                1224: {slidesPerView: 4, spaceBetween: 10}
            }
        }
    },
    {
        selector: '.project-slider',
        options: {
            loop: true,
            freeMode: true,
            autoplay: {delay: 5000},
            navigation: {nextEl: '.projects .slide-next', prevEl: '.projects .slide-perv'},

            breakpoints: {
                150: {slidesPerView: 1, spaceBetween: 10},
                768: {slidesPerView: 2, spaceBetween: 20},
                1224: {slidesPerView: 3, spaceBetween: 20}
            }
        }
    },
    {
        selector: '.brand-slider-down',
        options: {
            direction: 'vertical',
            slidesPerView: 3,
            spaceBetween: 20,
            loop: true,
            freeMode: true,
            freeModeMomentum: false,
            speed: 4000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
                reverseDirection: false
            }
        }
    },
    {
        selector: '.brand-slider-up',
        options: {
            direction: 'vertical',
            slidesPerView: 3,
            spaceBetween: 20,
            loop: true,
            freeMode: true,
            freeModeMomentum: false,
            speed: 4000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
                reverseDirection: true // 👈 برعکس
            }
        }
    },


];

swiperConfigs.forEach(item => {
    if (document.querySelector(item.selector)) {
        new Swiper(item.selector, item.options);
    }
});


/*! Counter on view — single section, no IDs, no deps */
(() => {
    const onReady = (fn) => {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', fn, { once: true });
        } else {
            fn();
        }
    };

    onReady(() => {
        const counters = Array.from(document.querySelectorAll('.counter-number'));
        if (!counters.length) return;

        const prefersReduced =
            window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        const format = (() => {
            const lang = document.documentElement.getAttribute('lang') || undefined;
            try { return new Intl.NumberFormat(lang).format; }
            catch { return (n) => n.toString(); }
        })();

        const easeFns = {
            linear: (t) => t,
            easeOutCubic: (t) => 1 - Math.pow(1 - t, 3),
            easeOutQuad: (t) => 1 - (1 - t) * (1 - t),
        };

        const animate = (el) => {
            const to   = Number(el.getAttribute('data-count-to')) || 0;
            const dur  = Math.max(200, parseInt(el.getAttribute('data-count-duration'), 10) || 1200);
            const ease = easeFns[el.getAttribute('data-count-easing')] || easeFns.easeOutCubic;

            if (prefersReduced) { el.textContent = format(Math.round(to)); return; }

            let start = null;
            const step = (ts) => {
                if (!start) start = ts;
                const t = Math.min(1, (ts - start) / dur);
                const val = Math.round(to * ease(t));
                el.textContent = format(val);
                if (t < 1) requestAnimationFrame(step);
            };
            requestAnimationFrame(step);
        };

        const io = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animate(entry.target);
                    obs.unobserve(entry.target); // یک‌بار اجرا
                }
            });
        }, { threshold: 0.25, rootMargin: '0px 0px -10% 0px' });

        counters.forEach(el => io.observe(el));
    });
})();


document.addEventListener('DOMContentLoaded', function () {
    const opener = document.querySelector('[data-open-video="section-video-dialog"]');
    const dialog = document.getElementById('section-video-dialog');
    if (!opener || !dialog) return;

    const video = dialog.querySelector('#section-video');
    const closeBtn = dialog.querySelector('[data-close-dialog]');

    function openDialog() {
        if (typeof dialog.showModal === 'function') {
            dialog.showModal();
        } else {
            dialog.setAttribute('open', '');
        }
        if (video) { video.play().catch(()=>{}); }
    }

    function closeDialog() {
        if (video) { video.pause(); video.currentTime = 0; }
        if (dialog.open && typeof dialog.close === 'function') dialog.close();
        else dialog.removeAttribute('open');
    }

    opener.addEventListener('click', openDialog);
    opener.addEventListener('keydown', (e)=>{
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openDialog(); }
    });

    closeBtn && closeBtn.addEventListener('click', closeDialog);

    dialog.addEventListener('click', (e) => { if (e.target === dialog) closeDialog(); });
    dialog.addEventListener('cancel', (e) => { e.preventDefault(); closeDialog(); }); // ESC
});
