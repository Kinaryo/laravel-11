<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- sweet alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- Trix Editor CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trix@2.0.0/dist/trix.css">

    <!-- Trix Editor JS -->
    <script src="https://cdn.jsdelivr.net/npm/trix@2.0.0/dist/trix.js"></script>

    <!-- Menggunakan slot title jika ada -->
    <title>{{ $title ?? 'Document' }}</title> <!-- fallback untuk title -->
</head>

<body class="h-full">



    @if ($title != 'login' && $title != 'register') <!-- Memastikan ini bukan halaman login -->
    <div class="min-h-full">
        <!-- Navbar -->
        <x-navbar></x-navbar>

        <!-- Header -->
        <x-header>{{ $title }}</x-header>

        <!-- Main Content -->
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{$slot}} <!-- Konten utama -->
            </div>
        </main>
    </div>
    @else
    <!-- Untuk halaman login, hanya tampilkan slot -->
    <div>
        {{ $slot }} <!-- Hanya form login yang ditampilkan -->
    </div>
    @endif
</body>

</html>