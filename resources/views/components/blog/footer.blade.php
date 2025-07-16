<footer class="bg-gray-900 text-white py-10">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-8 text-sm">
        <div>
            <h5 class="font-semibold text-lg mb-4">Tentang</h5>
            <p>UMKM Kelurahan Menanggal adalah inisiatif pemerintah kelurahan untuk mengangkat potensi bisnis warga lokal ke ranah digital.</p>
        </div>

        <div>
            <h5 class="font-semibold text-lg mb-4">Navigasi</h5>
            <ul class="space-y-2">
                <li><a href="{{ url('/') }}" class="hover:text-blue-400">Beranda</a></li>
                <li><a href="{{ url('/profile') }}" class="hover:text-blue-400">Profil</a></li>
                <li><a href="{{ url('/galeri') }}" class="hover:text-blue-400">Galeri</a></li>
                <li><a href="{{ url('/kontak') }}" class="hover:text-blue-400">Kontak</a></li>
            </ul>
        </div>

        <div>
            <h5 class="font-semibold text-lg mb-4">Kategori UMKM</h5>
            <ul class="space-y-2">
                <li><a href="{{ url('/umkm/jasa') }}" class="hover:text-blue-400">UMKM Jasa</a></li>
                <li><a href="{{ url('/umkm/makanan') }}" class="hover:text-blue-400">UMKM Makanan</a></li>
                <li><a href="{{ url('/umkm/minuman') }}" class="hover:text-blue-400">UMKM Minuman</a></li>
            </ul>
        </div>

        <div>
            <h5 class="font-semibold text-lg mb-4">Kontak</h5>
            <ul class="space-y-2">
                <li>Jl. Raya Menanggal No. 1</li>
                <li>Surabaya, Jawa Timur</li>
                <li>Email: kelurahan@menanggal.go.id</li>
                <li>Telepon: (031) 1234567</li>
            </ul>
        </div>
    </div>

    <div class="mt-10 border-t border-gray-700 pt-6 text-center text-sm text-gray-400">
        &copy; {{ date('Y') }} Kelurahan Menanggal • Dibuat oleh Tim IT Kelurahan
    </div>
</footer>
