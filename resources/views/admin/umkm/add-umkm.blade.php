<x-layouts.admin>
    <h1 class="fs-4 fw-bold mb-4">Tambah Data UMKM</h1>

    <div class="card p-4 shadow-sm">
        <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="pemilik" class="form-label">Pemilik <span class="text-danger">*</span></label>
                    <input type="text" name="pemilik" id="pemilik" class="form-control" placeholder="Masukkan nama pemilik usaha" required>
                </div>

                <div class="col-md-6">
                    <label for="usia_pemilik" class="form-label">Usia Pemilik <span class="text-danger">*</span></label>
                    <input type="number" name="usia_pemilik" id="usia_pemilik" class="form-control" placeholder="Masukkan usia" min="1" required>
                </div>

                <div class="col-md-6">
                    <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir <span class="text-danger">*</span></label>
                    <input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control" placeholder="Contoh: SMA, S1" required>
                </div>

                <div class="col-md-6">
                    <label for="nama_usaha" class="form-label">Nama Usaha <span class="text-danger">*</span></label>
                    <input type="text" name="nama_usaha" id="nama_usaha" class="form-control" placeholder="Masukkan nama usaha" required>
                </div>

                <div class="col-md-6">
                    <label for="no_telp" class="form-label">No. Telepon <span class="text-danger">*</span></label>
                    <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan nomor telepon" required>
                </div>

                <div class="col-md-6">
                    <label for="awal_mulai_usaha" class="form-label">Awal Mulai Usaha <span class="text-danger">*</span></label>
                    <input type="date" name="awal_mulai_usaha" id="awal_mulai_usaha" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="id_kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori UMKM --</option>
                        @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id_kategori }}" {{ old('id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label for="alamat" class="form-label">Alamat Usaha <span class="text-danger">*</span></label>
                    <textarea name="alamat" id="alamat" rows="2" class="form-control" placeholder="Masukkan alamat lengkap" required></textarea>
                </div>

                <div class="col-md-3">
                    <label for="rt" class="form-label">RT <span class="text-danger">*</span></label>
                    <input type="text" name="rt" id="rt" class="form-control" placeholder="Contoh: 01" required>
                </div>

                <div class="col-md-3">
                    <label for="rw" class="form-label">RW <span class="text-danger">*</span></label>
                    <input type="text" name="rw" id="rw" class="form-control" placeholder="Contoh: 05" required>
                </div>

                <div class="col-12">
                    <label for="deskripsi" class="form-label">Deskripsi Usaha <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" placeholder="Deskripsikan usaha secara singkat" required></textarea>
                </div>

                <div class="col-md-6">
                    <label for="foto" class="form-label">
                        Foto Usaha
                        <span class="text-danger">*</span><br>
                        <small class="text-muted">(Format: jpg, jpeg, png | Maks: 2MB)</small>
                    </label>
                    <input type="file" name="foto" id="foto" class="form-control" accept=".jpg,.jpeg,.png" required>

                    {{-- Preview gambar setelah dipilih --}}
                    <div class="mt-2" id="preview-container" style="display: none;">
                        <small class="text-muted">Preview Foto:</small><br>
                        <a id="preview-link" href="#" target="_blank">
                            <img id="preview-image" src="#" alt="Preview Foto" style="max-height: 100px; max-width: 100px; object-fit: cover; border: 1px solid #ccc;">
                        </a>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('admin.umkm.index') }}" class="btn btn-outline-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    {{-- Script preview --}}
    @push('scripts')
    <script>
        document.getElementById('foto').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const url = URL.createObjectURL(file);
                document.getElementById('preview-container').style.display = 'block';
                document.getElementById('preview-link').href = url;
                document.getElementById('preview-image').src = url;
            } else {
                document.getElementById('preview-container').style.display = 'none';
            }
        });
    </script>
    @endpush
</x-layouts.admin>
