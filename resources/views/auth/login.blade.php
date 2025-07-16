@extends('components.layouts.guest')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow rounded-4 d-flex flex-row overflow-hidden"
        style="max-width: 1000px; width: 100%; background-color: white;">

        <!-- Kolom Gambar -->
        <div class="w-55">
            <img src="{{ asset('images/kelurahan_menanggal.jpg') }}" alt="Kelurahan Menanggal"
                class="img-fluid h-100 w-100 object-fit-cover" style="object-position: center;">
        </div>

        <!-- Kolom Form -->
        <div class="p-5 w-45 d-flex flex-column justify-content-center">
            <div class="text-center mb-4">
                <h4 class="mb-1 fw-bold text-dark">Sign In</h4>
                <h6 class="text-secondary">Kelurahan Menanggal</h6>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" id="password" required>
                        <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                            <i id="toggleIcon" class="bi bi-eye-slash"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3 d-flex justify-content-between align-items-center small text-muted" style="font-size: 0.9rem;">
                    <div class="form-check m-0">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                        <label class="form-check-label ms-1" for="remember">Remember this Device</label>
                    </div>
                    <a href="#" class="text-decoration-none text-primary">Forgot Password ?</a>
                </div>

                <button type="submit" class="btn btn-primary w-100">Sign In</button>
            </form>
        </div>
    </div>
</div>

{{-- Toggle Password Script --}}
<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.getElementById('toggleIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        }
    }
</script>
@endsection
