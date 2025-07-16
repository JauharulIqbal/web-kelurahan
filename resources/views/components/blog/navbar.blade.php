<nav id="navbarMain" class="navbar navbar-expand-lg fixed-top navbar-dark bg-transparent transition">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">UMKM Kelurahan</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="d-flex align-items-center">
            <!-- Menu utama -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/profile') }}">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/galeri') }}">Galeri</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            UMKM
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/umkm/jasa') }}">UMKM Jasa</a></li>
                            <li><a class="dropdown-item" href="{{ url('/umkm/makanan') }}">UMKM Makanan</a></li>
                            <li><a class="dropdown-item" href="{{ url('/umkm/minuman') }}">UMKM Minuman</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak</a></li>
                </ul>
            </div>

            <!-- Tombol Login -->
            <div class="ms-4 d-none d-lg-block">
                <a href="{{ route('login') }}"
                    class="btn btn-outline-light border border-white rounded-pill px-4 py-1 fw-semibold login-btn transition">
                    Login
                </a>
            </div>
        </div>

    </div>
</nav>

<style>
    .transition {
        transition: background-color 0.4s ease, box-shadow 0.4s ease;
    }

    .navbar-scrolled {
        background-color: white !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar-scrolled .nav-link,
    .navbar-scrolled .navbar-brand {
        color: #000 !important;
    }

    .navbar-scrolled .nav-link:hover {
        color: #0d6efd !important;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navbar = document.getElementById("navbarMain");

        window.addEventListener("scroll", function() {
            if (window.scrollY > 20) {
                navbar.classList.add("navbar-scrolled", "navbar-light");
                navbar.classList.remove("navbar-dark", "bg-transparent");
            } else {
                navbar.classList.remove("navbar-scrolled", "navbar-light");
                navbar.classList.add("navbar-dark", "bg-transparent");
            }
        });
    });
</script>