document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.site-header');
    const mobileToggle = document.querySelector('.mobile-nav-toggle');
    const mobilePanel = document.querySelector('.mobile-nav-panel');

    const updateHeader = () => {
        if (!header) return;
        header.classList.toggle('is-scrolled', window.scrollY > 8);
    };

    updateHeader();
    window.addEventListener('scroll', updateHeader, { passive: true });

    if (mobileToggle && mobilePanel) {
        mobileToggle.addEventListener('click', () => {
            const expanded = mobileToggle.getAttribute('aria-expanded') === 'true';
            mobileToggle.setAttribute('aria-expanded', String(!expanded));
            mobilePanel.classList.toggle('show', !expanded);
            document.body.classList.toggle('mobile-nav-open', !expanded);
        });

        mobilePanel.querySelectorAll('.mobile-submenu-toggle').forEach((button) => {
            button.addEventListener('click', () => {
                const submenu = button.closest('li')?.querySelector('.mobile-submenu');
                if (!submenu) return;

                const expanded = button.getAttribute('aria-expanded') === 'true';
                button.setAttribute('aria-expanded', String(!expanded));
                button.textContent = expanded ? '+' : '−';
                submenu.classList.toggle('show', !expanded);
            });
        });

        mobilePanel.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                mobileToggle.setAttribute('aria-expanded', 'false');
                mobilePanel.classList.remove('show');
                document.body.classList.remove('mobile-nav-open');
            });
        });
    }

    const desktopDropdownItems = document.querySelectorAll('.site-nav-item');
    desktopDropdownItems.forEach((item) => {
        const trigger = item.querySelector(':scope > .site-nav-link');
        if (!trigger || !item.querySelector('.site-dropdown')) return;

        trigger.addEventListener('click', (event) => {
            if (window.innerWidth < 992) return;
            event.preventDefault();
            desktopDropdownItems.forEach((other) => {
                if (other !== item) other.classList.remove('is-open');
            });
            item.classList.toggle('is-open');
        });
    });

    document.addEventListener('click', (event) => {
        if (event.target.closest('.site-nav-item')) return;
        desktopDropdownItems.forEach((item) => item.classList.remove('is-open'));
    });
});
