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
});
