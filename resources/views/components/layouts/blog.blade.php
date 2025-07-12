<!DOCTYPE html>
<html lang="id">
<head>
    <title>{{ $title ?? 'UMKM Kelurahan' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <x-blog.navbar />
    <main class="min-h-screen py-8 px-4">
        {{ $slot }}
    </main>
    <x-blog.footer />
</body>
</html>
