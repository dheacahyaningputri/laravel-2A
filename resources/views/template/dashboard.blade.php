<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#4f46e5">
    <title>@yield('title', 'Ruang Akademik')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="app-shell">
        @include('template.header')

        <div class="workspace">
            @include('template.sidebar')

            <main class="main-content">
                <div class="page-container">
                    @yield('content')
                </div>
                <footer class="app-footer">
                    <span>Ruang Akademik</span>
                    <span>Belajar dengan langkahmu sendiri.</span>
                </footer>
            </main>
        </div>
    </div>
</body>
</html>
