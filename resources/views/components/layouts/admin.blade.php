<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    
    {{-- CSS --}}
    @vite('resources/js/app.js')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="d-flex" id="wrapper" style="min-height: 100vh;">
        {{-- Sidebar --}}
        <aside class="bg-white border-end shadow-sm" id="sidebar" style="width: 250px; flex-shrink: 0;">
            <x-admin.sidebar />
        </aside>

        {{-- Page Content --}}
        <div id="page-content-wrapper" class="flex-grow-1 d-flex flex-column">
            {{-- Navbar --}}
            <x-admin.navbar />

            {{-- Main Content --}}
            <main class="flex-grow-1 p-4 bg-light">
                <div class="container-fluid"> 
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
@stack('scripts')
</body>
</html>
