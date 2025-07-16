<x-layouts.blog>
<section class="position-relative overflow-hidden w-100 vh-100 p-0 m-0">

    <div id="homeCarousel" class="carousel slide carousel-fade vh-100" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner vh-100">
            @for ($i = 0; $i < 3; $i++)
                <div class="carousel-item {{ $i === 0 ? 'active' : '' }} vh-100">
                    <img src="{{ asset('/images/kelurahan_menanggal.jpg') }}" class="d-block w-100 h-100 object-fit-cover" style="object-position: center;" alt="Slide {{ $i + 1 }}">
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                        <h1 class="display-4 fw-bold mb-3 text-white">UMKM Kelurahan Menanggal</h1>
                        <p class="lead mb-4 text-white">Mendukung dan Mengembangkan Potensi Usaha Warga Lokal</p>
                        <a href="{{ url('/umkm') }}" class="btn btn-primary px-4 py-2">Jelajahi UMKM</a>
                    </div>
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark" style="opacity: 0.5; z-index: 1;"></div>
                </div>
            @endfor
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</section>



    <section class="py-5 bg-white">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Apa itu UMKM Kelurahan?</h2>
            <p class="text-muted">UMKM Kelurahan Menanggal adalah wadah pemberdayaan ekonomi masyarakat lokal melalui promosi, pelatihan, dan fasilitas digitalisasi usaha kecil menengah dan mikro.</p>
        </div>
    </section>
</x-layouts.blog>