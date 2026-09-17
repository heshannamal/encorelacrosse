document.addEventListener('DOMContentLoaded', () => {
    const dayMs = 24 * 60 * 60 * 1000;
    const now = new Date();

    document.querySelectorAll('.event-countdown-item[data-event-date]').forEach((item) => {
        const target = new Date(`${item.dataset.eventDate}T00:00:00`);
        const days = Math.ceil((target.getTime() - now.getTime()) / dayMs);
        const output = item.querySelector('.countdown-days');

        if (output && Number.isFinite(days)) {
            output.textContent = days;
        }
    });
});
