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
                <input type="text" name="search" class="form-control me-2" placeholder="Cari data UMKM..." value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
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
                                <button type="button" class="btn btn-sm btn-danger delete-btn"
                                    data-id="{{ $data->id_umkm }}"
                                    data-nama="{{ $data->nama_usaha }}"
                                    data-pemilik="{{ $data->pemilik }}"
                                    title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Hidden Form for Delete -->
                                <form id="delete-form-{{ $data->id_umkm }}"
                                    action="{{ route('admin.umkm.destroy', $data->id_umkm) }}"
                                    method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
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

    @push('scripts')
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Custom SweetAlert CSS with Dark Mode Support -->
    <link href="{{ asset('css/custom-sweetalert.css') }}" rel="stylesheet">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to detect if dark mode is active
            function isDarkMode() {
                return document.body.classList.contains('dark-mode');
            }

            // Function to get theme-appropriate colors
            function getThemeColors() {
                const darkMode = isDarkMode();
                return {
                    confirmButtonColor: darkMode ? '#dc2626' : '#dc3545',
                    cancelButtonColor: darkMode ? '#4b5563' : '#6c757d',
                    background: darkMode ? '#1f2937' : '#ffffff',
                    color: darkMode ? '#f9fafb' : '#2d3748'
                };
            }

            // Handle delete button clicks
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const nama = this.getAttribute('data-nama');
                    const pemilik = this.getAttribute('data-pemilik');
                    const colors = getThemeColors();

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        html: `
                    <div class="text-start">
                        <p class="mb-2"><strong>Data yang akan dihapus:</strong></p>
                        <div class="alert alert-warning text-start">
                            <i class="bi bi-shop me-2"></i><strong>Nama Usaha:</strong> ${nama}<br>
                            <i class="bi bi-person me-2"></i><strong>Pemilik:</strong> ${pemilik}
                        </div>
                        <p class="text-muted small">
                            <i class="bi bi-exclamation-triangle text-warning me-1"></i>
                            Data yang sudah dihapus tidak dapat dikembalikan!
                        </p>
                    </div>
                `,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: colors.confirmButtonColor,
                        cancelButtonColor: colors.cancelButtonColor,
                        confirmButtonText: '<i class="bi bi-trash me-1"></i>Ya, Hapus!',
                        cancelButtonText: '<i class="bi bi-x-circle me-1"></i>Batal',
                        background: colors.background,
                        color: colors.color,
                        customClass: {
                            popup: 'shadow-lg border-0',
                            header: 'border-bottom-0 pb-2',
                            title: 'fw-bold',
                            content: 'pt-0',
                            confirmButton: 'btn btn-danger px-4',
                            cancelButton: 'btn btn-secondary px-4',
                            actions: 'gap-2'
                        },
                        buttonsStyling: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        focusCancel: true,
                        reverseButtons: true,
                        didOpen: () => {
                            // Apply additional dark mode styling if needed
                            if (isDarkMode()) {
                                const popup = Swal.getPopup();
                                popup.style.borderColor = '#374151';
                            }
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const loadingColors = getThemeColors();

                            // Show loading state with theme-appropriate styling
                            Swal.fire({
                                title: 'Menghapus...',
                                html: 'Sedang memproses penghapusan data',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                showConfirmButton: false,
                                background: loadingColors.background,
                                color: loadingColors.color,
                                customClass: {
                                    popup: 'shadow-lg'
                                },
                                didOpen: () => {
                                    Swal.showLoading();

                                    // Style the loading spinner for dark mode
                                    if (isDarkMode()) {
                                        const loader = document.querySelector('.swal2-loader');
                                        if (loader) {
                                            loader.style.borderColor = '#374151';
                                            loader.style.borderTopColor = '#60a5fa';
                                        }
                                    }
                                }
                            });

                            // Submit the form
                            document.getElementById(`delete-form-${id}`).submit();
                        }
                    });
                });
            });

            // Show success message if delete was successful
            @if(session('success'))
            const successColors = getThemeColors();

            Swal.fire({
                title: 'Berhasil!',
                text: `{!! session('success') !!}`,
                icon: 'success',
                timer: 3000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end',
                background: successColors.background,
                color: successColors.color,
                customClass: {
                    popup: 'shadow-lg'
                },
                timerProgressBar: true,
                didOpen: () => {
                    // Additional styling for dark mode toast
                    if (isDarkMode()) {
                        const popup = Swal.getPopup();
                        popup.style.borderColor = '#374151';

                        const progressBar = popup.querySelector('.swal2-timer-progress-bar');
                        if (progressBar) {
                            progressBar.style.backgroundColor = '#34d399';
                        }
                    }
                }
            });
            @endif

            // Show error message if there's any error
            @if(session('error'))
            const errorColors = getThemeColors();

            Swal.fire({
                title: 'Oops!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK',
                background: errorColors.background,
                color: errorColors.color,
                confirmButtonColor: isDarkMode() ? '#3b82f6' : '#0d6efd',
                customClass: {
                    popup: 'shadow-lg',
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false,
                didOpen: () => {
                    if (isDarkMode()) {
                        const popup = Swal.getPopup();
                        popup.style.borderColor = '#374151';
                    }
                }
            });
            @endif

            // Listen for theme changes and update SweetAlert accordingly
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                        // Theme has changed, update any existing SweetAlert popups
                        const existingPopup = Swal.getPopup();
                        if (existingPopup) {
                            const colors = getThemeColors();
                            existingPopup.style.backgroundColor = colors.background;
                            existingPopup.style.color = colors.color;
                            existingPopup.style.borderColor = isDarkMode() ? '#374151' : '#e5e7eb';
                        }
                    }
                });
            });

            // Start observing theme changes
            observer.observe(document.body, {
                attributes: true,
                attributeFilter: ['class']
            });
        });
    </script>
    @endpush
</x-layouts.admin>