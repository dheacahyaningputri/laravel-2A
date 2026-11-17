<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Latihan Laravel')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="menu">
        <a href="/daftar/mahasiswa" class="{{ request()->is('daftar/mahasiswa') ? 'active' : '' }}">Daftar Mahasiswa</a>
        <a href="/kalkulator/segitiga" class="{{ request()->is('kalkulator/segitiga') ? 'active' : '' }}">Kalkulator Segitiga</a>
    </nav>

    <div class="wrap">
        @yield('content')
    </div>
</body>
</html>