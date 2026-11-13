<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $judul }} - Olshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f5f3ff; }
        .navbar-olshop { background: linear-gradient(90deg, #4f46e5, #7c3aed); }
        .hero {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 55%, #ec4899 100%);
            color: #fff; border-radius: 28px; padding: 64px 40px;
        }
        .card-produk { border: 0; border-radius: 20px; transition: .2s; box-shadow: 0 8px 24px rgba(79,70,229,.1); }
        .card-produk:hover { transform: translateY(-4px); box-shadow: 0 14px 32px rgba(79,70,229,.2); }
        .btn-olshop { background: #4f46e5; color: #fff; border-radius: 999px; padding: 10px 28px; }
        .btn-olshop:hover { background: #4338ca; color: #fff; }
        footer { color: #6b7280; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-olshop sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/home">Olshop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->is('home') ? 'active fw-bold' : '' }}" href="/home">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('product', 'produk/*') ? 'active fw-bold' : '' }}" href="/product">Product</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active fw-bold' : '' }}" href="/about">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        @yield('content')
    </main>

    <footer class="text-center pb-4 small">&copy; {{ date('Y') }} Olshop. Latihan Laravel.</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>