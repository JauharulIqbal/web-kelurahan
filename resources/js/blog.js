import 'bootstrap/dist/css/bootstrap.min.css';
import './bootstrap';
import '../css/app.css';
 
document.addEventListener('DOMContentLoaded', function () {
    const darkToggle = document.getElementById('toggleDarkMode');
    const icon = darkToggle?.querySelector('i');

    // Load saved theme untuk BLOG
    if (localStorage.getItem('blog-theme') === 'dark') {
        document.body.classList.add('dark-mode');
        icon?.classList.replace('bi-moon-stars', 'bi-sun');
    }

    // Toggle theme dan save ke localStorage dengan key BLOG
    darkToggle?.addEventListener('click', () => {
        const isDark = document.body.classList.toggle('dark-mode');
        icon?.classList.replace(isDark ? 'bi-moon-stars' : 'bi-sun', isDark ? 'bi-sun' : 'bi-moon-stars');
        localStorage.setItem('blog-theme', isDark ? 'dark' : 'light');
    });
});