<!DOCTYPE html>
<html lang="id">
<head>
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="flex bg-gray-100">
    <x-admin.sidebar />
    <div class="flex-1">
        <x-admin.navbar />
        <main class="p-6">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
