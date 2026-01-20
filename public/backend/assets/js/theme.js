
(function () {
    const html = document.documentElement;
    const themeKey = 'data-bs-theme';
    const storageKey = 'app-theme';
    const toggleBtnId = 'light-dark-mode';

    function setTheme(theme) {
        html.setAttribute(themeKey, theme);
        localStorage.setItem(storageKey, theme);
        updateIcon(theme);
    }

    function updateIcon(theme) {
        const btn = document.getElementById(toggleBtnId);
        if (!btn) return;

        // Clear existing content (whether it's an <i> or an <svg>)
        btn.innerHTML = '';

        // Create a new <i> element
        const newIcon = document.createElement('i');
        newIcon.className = 'align-middle noti-icon';

        // Set the correct icon name
        if (theme === 'dark') {
            newIcon.setAttribute('data-feather', 'sun');
        } else {
            newIcon.setAttribute('data-feather', 'moon');
        }

        // Append the new icon to the button
        btn.appendChild(newIcon);

        // Re-initialize feather icons for the new element
        if (window.feather) {
            window.feather.replace();
        }
    }

    function init() {
        // Load saved theme or default to light
        const savedTheme = localStorage.getItem(storageKey) || 'light';

        // Bind click event FIRST to ensure it works even if icon update fails
        const btn = document.getElementById(toggleBtnId);
        if (btn) {
            btn.addEventListener('click', function (e) {
                e.preventDefault(); // Prevent any default action
                const currentTheme = html.getAttribute(themeKey);
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                setTheme(newTheme);
            });
        }

        // Set initial theme
        setTheme(savedTheme);
    }

    // Run init
    init();

    // Safety check for DOM availability
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    }
})();
