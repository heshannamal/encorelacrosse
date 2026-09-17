document.addEventListener('DOMContentLoaded', () => {
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.querySelectorAll('[data-home-carousel]').forEach((carouselElement) => {
        if (!window.bootstrap?.Carousel) return;

        const interval = Number(carouselElement.dataset.interval || 3000);
        const carousel = window.bootstrap.Carousel.getOrCreateInstance(carouselElement, {
            interval: reducedMotion ? false : interval,
            pause: false,
            ride: reducedMotion ? false : 'carousel',
            touch: true,
            wrap: true,
        });

        if (!reducedMotion) carousel.cycle();
    });

    const revealElements = document.querySelectorAll('[data-home-reveal]');
    if (!reducedMotion && 'IntersectionObserver' in window) {
        revealElements.forEach((element) => element.classList.add('home-reveal'));

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            });
        }, {
            threshold: 0.08,
            rootMargin: '0px 0px -35px 0px',
        });

        revealElements.forEach((element) => observer.observe(element));
    } else {
        revealElements.forEach((element) => element.classList.add('is-visible'));
    }

    // Keep autoplay video CPU/network use modest when sections are far outside the viewport.
    const videos = document.querySelectorAll('.encore-home video[autoplay]');
    if ('IntersectionObserver' in window) {
        const videoObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                const video = entry.target;
                if (entry.isIntersecting) {
                    const playPromise = video.play();
                    if (playPromise?.catch) playPromise.catch(() => {});
                } else {
                    video.pause();
                }
            });
        }, { rootMargin: '180px 0px' });

        videos.forEach((video) => videoObserver.observe(video));
    }
});
