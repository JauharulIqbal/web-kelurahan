<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            {{-- Logo / Brand --}}
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-lg font-bold text-blue-600">UMKM Kelurahan</a>
            </div>

            {{-- Menu --}}
            <div class="hidden md:flex space-x-6 items-center">
                <a href="{{ url('/') }}" class="hover:text-blue-600 text-sm">Beranda</a>
                <a href="{{ url('/profile') }}" class="hover:text-blue-600 text-sm">Profil</a>
                <a href="{{ url('/galeri') }}" class="hover:text-blue-600 text-sm">Galeri</a>

                {{-- Dropdown UMKM --}}
                <div class="relative group">
                    <button
                        class="text-sm hover:text-blue-600 focus:outline-none flex items-center space-x-1">
                        <span>UMKM</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="absolute top-full mt-2 w-40 bg-white border rounded shadow-md opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all">
                        <a href="{{ url('/umkm/jasa') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">UMKM Jasa</a>
                        <a href="{{ url('/umkm/makanan') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">UMKM Food</a>
                        <a href="{{ url('/umkm/minuman') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">UMKM Drink</a>
                    </div>
                </div>

                <a href="{{ url('/kontak') }}" class="hover:text-blue-600 text-sm">Kontak</a>
            </div>

            {{-- Mobile Menu Placeholder (optional) --}}
            <div class="md:hidden">
                <button class="text-gray-500 hover:text-gray-700">
                    <!-- icon hamburger -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>