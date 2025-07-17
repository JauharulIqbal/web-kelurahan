<x-layouts.admin>
    <h1 class="fs-4 fw-bold mb-4 text-start ms-1 text-dark dashboard-title">Dashboard</h1>

    {{-- Kartu Statistik --}}
    <div class="row g-4 mb-4">
        {{-- Jumlah Kategori --}}
        <div class="col-md-6">
            <div class="card stat-card shadow border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <div class="stat-title text-dark">Jumlah Kategori UMKM</div>
                            <div class="stat-value text-adminkategori">{{ $jumlahKategori }}</div>
                        </div>
                        <div class="stat-icon text-adminkategori"><i class="bi bi-tags-fill"></i></div>
                    </div>
                </div>
                <div class="stat-footer bg-adminkategori text-white d-flex justify-content-between align-items-center">
                    Data Kategori UMKM
                    <i class="bi bi-arrow-up-right-circle-fill"></i>
                </div>
            </div>
        </div>

        {{-- Jumlah UMKM --}}
        <div class="col-md-6">
            <div class="card stat-card shadow border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <div class="stat-title text-dark">Jumlah UMKM</div>
                            <div class="stat-value text-success">{{ $jumlahUmkm }}</div>
                        </div>
                        <div class="stat-icon text-success"><i class="bi bi-briefcase-fill"></i></div>
                    </div>
                </div>
                <div class="stat-footer bg-success text-white d-flex justify-content-between align-items-center">
                    Data Pelaku Usaha
                    <i class="bi bi-arrow-up-right-circle-fill"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart Donut --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card stat-card shadow border-0">
                <div class="card-body text-center">
                    <h6 class="stat-title fw-bold mb-4 text-dark">Data UMKM Setiap RW</h6>

                    <div style="max-width: 320px; margin: 0 auto;">
                        <canvas id="umkmPerRwChart" height="240"></canvas>
                    </div>

                    <div class="row mt-4 justify-content-center">
                        @foreach ($labelRW as $index => $rw)
                            @php $colorClass = $index % count($chartColors); @endphp
                            <div class="col-auto text-center px-3 py-1">
                                <span class="dot-legend dot-color-{{ $colorClass }}"></span>
                                <div class="fw-semibold small text-dark">{{ $rw }}</div>
                                <div class="fw-semibold small text-color-{{ $colorClass }}">
                                    {{ $dataRW[$index] }} UMKM
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Ringkasan --}}
    <div class="card p-4 shadow border-0 bg-white dark-bg-dark">
        <h6 class="stat-title fw-bold mb-3 text-dark">Data UMKM Terbaru</h6>

        <div class="table-responsive">
            <table class="table align-middle table-bordered bg-white">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama Usaha</th>
                        <th>Deskripsi</th>
                        <th>Alamat Usaha</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Kategori</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($umkmList as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration + ($umkmList->firstItem() - 1) }}</td>
                            <td>{{ $data->nama_usaha }}</td>
                            <td>{{ $data->deskripsi }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td class="text-center">{{ $data->rt }}</td>
                            <td class="text-center">{{ $data->rw }}</td>
                            <td>{{ $data->kategori?->nama_kategori ?? '-' }}</td>
                            <td class="text-center">
                                @if ($data->foto)
                                    <a href="{{ asset('storage/' . $data->foto) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto UMKM"
                                            width="70" height="70"
                                            class="object-fit-cover rounded border"
                                            style="object-fit: cover;">
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center text-muted">Tidak ada data UMKM.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-3 d-flex justify-content-center">
            {{ $umkmList->links() }}
        </div>
    </div>

    {{-- Donut Chart Script --}}
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('umkmPerRwChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($labelRW),
                datasets: [{
                    data: @json($dataRW),
                    backgroundColor: @json($chartColors),
                    hoverOffset: 10
                }]
            },
            options: {
                cutout: '70%',
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#fff',
                        titleColor: '#000',
                        bodyColor: '#000',
                        borderColor: '#dee2e6',
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.raw + ' UMKM';
                            }
                        }
                    }
                }
            }
        });
    </script>
    @endpush
</x-layouts.admin>
