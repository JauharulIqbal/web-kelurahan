<x-layouts.admin>
    <h1 class="fs-4 fw-bold mb-4">Edit Data UMKM</h1>

    <div class="card p-4 shadow-sm">
        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.umkm.update', $umkm->id_umkm) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="pemilik" class="form-label">Pemilik <span class="text-danger">*</span></label>
                    <input type="text" name="pemilik" id="pemilik" class="form-control @error('pemilik') is-invalid @enderror" 
                           value="{{ old('pemilik', $umkm->pemilik) }}" required>
                    @error('pemilik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="usia_pemilik" class="form-label">Usia Pemilik <span class="text-danger">*</span></label>
                    <input type="number" name="usia_pemilik" id="usia_pemilik" class="form-control @error('usia_pemilik') is-invalid @enderror" 
                           value="{{ old('usia_pemilik', $umkm->usia_pemilik) }}" min="1" required>
                    @error('usia_pemilik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir <span class="text-danger">*</span></label>
                    <input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" 
                           value="{{ old('pendidikan_terakhir', $umkm->pendidikan_terakhir) }}" required>
                    @error('pendidikan_terakhir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nama_usaha" class="form-label">Nama Usaha <span class="text-danger">*</span></label>
                    <input type="text" name="nama_usaha" id="nama_usaha" class="form-control @error('nama_usaha') is-invalid @enderror" 
                           value="{{ old('nama_usaha', $umkm->nama_usaha) }}" required>
                    @error('nama_usaha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="no_telp" class="form-label">No. Telepon <span class="text-danger">*</span></label>
                    <input type="text" name="no_telp" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror" 
                           value="{{ old('no_telp', $umkm->no_telp) }}" required>
                    @error('no_telp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="awal_mulai_usaha" class="form-label">Awal Mulai Usaha <span class="text-danger">*</span></label>
                    <input type="date" name="awal_mulai_usaha" id="awal_mulai_usaha" class="form-control @error('awal_mulai_usaha') is-invalid @enderror" 
                           value="{{ old('awal_mulai_usaha', $umkm->awal_mulai_usaha) }}" required>
                    @error('awal_mulai_usaha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="id_kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id_kategori }}" 
                                {{ (old('id_kategori', $umkm->id_kategori) == $kategori->id_kategori) ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                        @endforeach
                    </select>
                    @error('id_kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="alamat" class="form-label">Alamat Usaha <span class="text-danger">*</span></label>
                    <textarea name="alamat" id="alamat" rows="2" class="form-control @error('alamat') is-invalid @enderror" 
                              placeholder="Masukkan alamat lengkap" required>{{ old('alamat', $umkm->alamat) }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="rt" class="form-label">RT <span class="text-danger">*</span></label>
                    <input type="text" name="rt" id="rt" class="form-control @error('rt') is-invalid @enderror" 
                           value="{{ old('rt', $umkm->rt) }}" placeholder="Contoh: 01" required>
                    @error('rt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="rw" class="form-label">RW <span class="text-danger">*</span></label>
                    <input type="text" name="rw" id="rw" class="form-control @error('rw') is-invalid @enderror" 
                           value="{{ old('rw', $umkm->rw) }}" placeholder="Contoh: 05" required>
                    @error('rw')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="deskripsi" class="form-label">Deskripsi Usaha <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror" 
                              placeholder="Deskripsikan usaha secara singkat" required>{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="foto" class="form-label">
                        Ganti Foto Usaha (Opsional)<br>
                        <small class="text-muted">(Format: jpg, jpeg, png | Maks: 2MB)</small>
                    </label>
                    <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" 
                           accept=".jpg,.jpeg,.png">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if ($umkm->foto)
                        <div class="mt-2">
                            <small class="text-muted">Foto Dokumentasi Usaha: 
                                <a href="{{ asset('storage/' . $umkm->foto) }}" target="_blank" class="text-decoration-none">
                                    {{ basename($umkm->foto) }}
                                </a>
                            </small>
                        </div>
                    @endif
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('admin.umkm.index') }}" class="btn btn-outline-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.admin>