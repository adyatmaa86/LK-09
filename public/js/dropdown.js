document.addEventListener('DOMContentLoaded', () => {
    const dropdownContainers = document.querySelectorAll('.custom-dropdown');

    dropdownContainers.forEach(container => {
        const btn = container.querySelector('.dropdown-btn');
        const menu = container.querySelector('.dropdown-menu');
        const chevron = container.querySelector('.dropdown-chevron');
        const text = container.querySelector('.dropdown-text');
        const input = container.querySelector('.dropdown-input');
        const items = container.querySelectorAll('.dropdown-item');
        const autoSubmit = container.dataset.autoSubmit === 'true';
        let isOpen = false;

        function toggle() {
            isOpen = !isOpen;
            if (isOpen) {
                menu.classList.remove('hidden');
                setTimeout(() => {
                    menu.classList.remove('opacity-0', 'translate-y-2');
                    menu.classList.add('opacity-100', 'translate-y-0');
                }, 10);
                chevron.style.transform = 'rotate(180deg)';
            } else {
                menu.classList.remove('opacity-100', 'translate-y-0');
                menu.classList.add('opacity-0', 'translate-y-2');
                setTimeout(() => menu.classList.add('hidden'), 300);
                chevron.style.transform = 'rotate(0deg)';
            }
        }

        btn.addEventListener('click', (e) => {
            e.preventDefault();
            toggle();
        });

        items.forEach(item => {
            item.addEventListener('click', () => {
                const value = item.getAttribute('data-value');
                text.textContent = value;
                input.value = value;

                items.forEach(i => {
                    i.classList.remove('bg-indigo-50', 'text-indigo-700');
                    i.classList.add('text-slate-600');
                });
                item.classList.add('bg-indigo-50', 'text-indigo-700');
                item.classList.remove('text-slate-600');

                toggle();
                if (autoSubmit) {
                    const form = container.closest('form');
                    if (form) form.submit();
                }
            });
        });

        document.addEventListener('click', (e) => {
            if (isOpen && !container.contains(e.target)) {
                toggle();
            }
        });
    });
});
