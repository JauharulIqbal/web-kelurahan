<nav class="navbar navbar-expand navbar-light bg-white shadow-sm px-4">
    <button class="btn btn-outline-secondary me-3" id="sidebarToggle">
        <i class="bi bi-list"></i>
    </button>

    <form class="d-none d-md-inline-block form-inline me-auto ms-md-3 my-2 my-md-0 w-30">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search here..." aria-label="Search">
            <button class="btn btn-primary" type="button">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form>

    <ul class="navbar-nav ms-auto">
        <li class="nav-item mx-2">
            <a class="nav-link" href="#"><i class="bi bi-bell fs-5"></i></a>
        </li>
        <li class="nav-item mx-2">
            <a class="nav-link" href="#"><i class="bi bi-chat-left-text fs-5"></i></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                <img src="{{ asset('images/profile.jpg') }}" class="rounded-circle" width="32" height="32" alt="Admin">
                <span class="ms-2">Admin</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li><hr class="dropdown-divider"></li>
            </ul>
        </li>
    </ul>
</nav>
