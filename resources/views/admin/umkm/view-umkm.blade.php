<x-layouts.admin>
    <h1 class="fs-4 fw-bold mb-4">Data UMKM</h1>

    <div class="card p-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex gap-2">
                <a href="{{ route('admin.umkm.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Tambah UMKM
                </a>
                <a href="{{ route('admin.umkm.export.pdf') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-file-earmark-pdf me-1"></i> Export PDF
                </a>
            </div>
            <form action="{{ route('admin.umkm.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Search..." value="{{ request('search') }}">
                <button class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table align-middle table-bordered bg-white">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Pemilik</th>
                        <th>Usia</th>
                        <th>Pendidikan</th>
                        <th>Nama Usaha</th>
                        <th>Deskripsi</th>
                        <th>Alamat Usaha</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>No. Telp</th>
                        <th>Awal Usaha</th>
                        <th>Kategori</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($umkm as $data)
                    <tr>
                        <td class="text-center">{{ $loop->iteration + ($umkm->firstItem() - 1) }}</td>
                        <td>{{ $data->pemilik }}</td>
                        <td class="text-center">{{ $data->usia_pemilik }}</td>
                        <td>{{ $data->pendidikan_terakhir }}</td>
                        <td>{{ $data->nama_usaha }}</td>
                        <td>{{ $data->deskripsi }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td class="text-center">{{ $data->rt }}</td>
                        <td class="text-center">{{ $data->rw }}</td>
                        <td>{{ $data->no_telp }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->awal_mulai_usaha)->format('d/m/Y') }}</td>
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
                        <td class="text-center">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <a href="{{ route('admin.umkm.edit', $data->id_umkm) }}" class="btn btn-sm btn-info text-white" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.umkm.destroy', $data->id_umkm) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
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

                    @if($umkm->isEmpty())
                    <tr>
                        <td colspan="13" class="text-center text-muted">Tidak ada data UMKM.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-3 d-flex justify-content-center">
            {{ $umkm->links() }}
        </div>
    </div>
</x-layouts.admin>