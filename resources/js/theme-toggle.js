// Theme toggle logic for Navbar (Multiple buttons support)
document.addEventListener('DOMContentLoaded', function() {
    const themeToggleBtns = document.querySelectorAll('.theme-toggle-btn');
    const darkIcons = document.querySelectorAll('.theme-toggle-dark-icon');
    const lightIcons = document.querySelectorAll('.theme-toggle-light-icon');

    if (themeToggleBtns.length === 0) return;

    // Helper to update all icons across all buttons
    const updateIcons = () => {
        const isDark = document.documentElement.classList.contains('dark');
        darkIcons.forEach(icon => {
            if (isDark) icon.classList.add('hidden');
            else icon.classList.remove('hidden');
        });
        lightIcons.forEach(icon => {
            if (isDark) icon.classList.remove('hidden');
            else icon.classList.add('hidden');
        });
    };

    // Set initial state
    updateIcons();

    themeToggleBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Toggle theme
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
            
            // Update all icons
            updateIcons();
        });
    });
});
