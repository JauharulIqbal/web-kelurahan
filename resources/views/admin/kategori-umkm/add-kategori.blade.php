<x-layouts.admin>
    <h1 class="fs-4 fw-bold mb-4">Tambah Kategori UMKM</h1>

    <div class="card p-4 shadow-sm">
        <form action="{{ route('admin.kategori-umkm.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nama_kategori" class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror"
                        value="{{ old('nama_kategori') }}" placeholder="Masukkan nama kategori" required>
                    @error('nama_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('admin.kategori-umkm.index') }}" class="btn btn-outline-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.admin>