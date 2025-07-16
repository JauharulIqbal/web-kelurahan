<aside class="bg-white border-end h-100 shadow-sm" id="sidebar" style="width: 250px;">
    <div class="sidebar-header text-center py-4">
        <h5 class="mb-0 fw-bold text-dark">Kelurahan Menanggal</h5>
    </div>

    <ul class="nav flex-column px-3 py-4">
        <li class="nav-item mb-2">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link d-flex align-items-center gap-3 px-3 py-2 {{ request()->is('admin/dashboard') ? 'sidebar-active' : 'text-dark' }}">
                <div class="icon-wrapper">
                    <i class="bi bi-speedometer2"></i>
                </div>
                <span class="fw-semibold">Dashboard</span>
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="{{ route('admin.umkm.index') }}"
                class="nav-link d-flex align-items-center gap-3 px-3 py-2 {{ request()->is('admin/umkm*') ? 'sidebar-active' : 'text-dark' }}">
                <div class="icon-wrapper">
                    <i class="bi bi-shop"></i>
                </div>
                <span class="fw-semibold">Data UMKM</span>
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="{{ route('admin.kategori-umkm.index') }}"
                class="nav-link d-flex align-items-center gap-3 px-3 py-2 {{ request()->is('admin/kategori*') ? 'sidebar-active' : 'text-dark' }}">
                <div class="icon-wrapper">
                    <i class="bi bi-tags"></i>
                </div>
                <span class="fw-semibold">Kategori UMKM</span>
            </a>
        </li>
    </ul>
</aside>