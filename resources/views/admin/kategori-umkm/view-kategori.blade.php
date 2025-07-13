<x-layouts.admin>
    <h1 class="fs-4 fw-bold mb-4">Data Kategori UMKM</h1>

    <div class="card p-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex gap-2">
                <a href="{{ route('admin.kategori-umkm.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
                </a>
            </div>
            <form action="{{ route('admin.kategori-umkm.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Search..." value="{{ request('search') }}">
                <button class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table align-middle table-bordered bg-white">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama Kategori</th>
                        <th>Jumlah UMKM</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategoris as $kategori)
                    <tr>
                        <td class="text-center">{{ $loop->iteration + ($kategoris->firstItem() - 1) }}</td>
                        <td>{{ $kategori->nama_kategori }}</td>
                        <td class="text-center">{{ $kategori->umkm_count ?? 0 }}</td>
                        <td class="text-center">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <a href="{{ route('admin.kategori-umkm.edit', $kategori->id_kategori) }}" class="btn btn-sm btn-info text-white" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.kategori-umkm.destroy', $kategori->id_kategori) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    @if($kategoris->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center text-muted">Tidak ada data kategori UMKM.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-3 d-flex justify-content-center">
            {{ $kategoris->links() }}
        </div>
    </div>
</x-layouts.admin>