document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.site-header');
    const navbar = document.getElementById('mainNavbar');

    const syncHeaderState = () => {
        if (!header) return;
        header.classList.toggle('is-scrolled', window.scrollY > 12);
    };

    syncHeaderState();
    window.addEventListener('scroll', syncHeaderState, { passive: true });

    // Close the mobile navigation after a normal destination is selected.
    if (navbar && window.bootstrap?.Collapse) {
        navbar.querySelectorAll('a.nav-link:not(.dropdown-toggle), a.dropdown-item').forEach((link) => {
            link.addEventListener('click', () => {
                if (window.innerWidth >= 992 || !navbar.classList.contains('show')) return;
                window.bootstrap.Collapse.getOrCreateInstance(navbar).hide();
            });
        });
    }

    // Add restrained scroll reveals to major content sections without changing layout.
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const revealTargets = document.querySelectorAll(
        '.site-main > section, .site-main .container-fluid.py-5, .site-main .container.py-5'
    );

    if (!reducedMotion && 'IntersectionObserver' in window) {
        revealTargets.forEach((element, index) => {
            if (element.classList.contains('home-opening-hero') || element.classList.contains('showcase-hero')) return;
            element.classList.add('encore-reveal');
            element.style.transitionDelay = `${Math.min(index % 3, 2) * 45}ms`;
        });

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -35px 0px' });

        document.querySelectorAll('.encore-reveal').forEach((element) => observer.observe(element));
    }
});
