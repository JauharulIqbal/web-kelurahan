import 'bootstrap/dist/css/bootstrap.min.css';
import './bootstrap';
import '../css/app.css';


document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');

    toggle?.addEventListener('click', () => {
        sidebar.classList.toggle('d-none');
    });
});
