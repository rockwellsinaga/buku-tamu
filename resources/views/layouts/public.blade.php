<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Buku tamu digital Dinas Arsip dan Perpustakaan Kota Semarang">
    <title>@yield('title', 'Buku Tamu Arpusda')</title>
    <link rel="icon" href="{{ asset('assets/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark app-navbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
                <img src="{{ asset('Lambang_Kota_Semarang.png') }}" alt="Lambang Kota Semarang" width="34" height="40">
                <span><strong>Arpusda</strong><small class="d-block">Buku Tamu Digital</small></span>
            </a>
            <a class="btn btn-outline-light btn-sm" href="{{ url('/admin') }}">Dashboard Petugas</a>
        </div>
    </nav>

    <main>
        @if (session('success'))
            <div class="container pt-4">
                <div class="alert alert-success shadow-sm mb-0" role="alert">{{ session('success') }}</div>
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="border-top py-4 mt-5 bg-white">
        <div class="container d-flex flex-column flex-md-row justify-content-between gap-2 text-secondary small">
            <span>&copy; {{ date('Y') }} Dinas Arsip dan Perpustakaan Kota Semarang</span>
            <span>Pelayanan ramah, data tercatat, kunjungan terukur.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html>
