<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'sans-serif'] },
                    colors: {
                        lavender: '#C9B8FF',
                        blush: '#FFD1E3',
                        mint: '#C6F1E0',
                        peach: '#FFE2CF',
                        sky: '#CDE7FF',
                        ink: '#4B4468'
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0) }
            50% { transform: translateY(-18px) }
        }
        .float-slow { animation: float 7s ease-in-out infinite; }
        .float-slower { animation: float 10s ease-in-out infinite; }
    </style>
</head>
<body class="min-h-screen font-sans text-ink bg-gradient-to-br from-blush via-lavender to-sky relative overflow-hidden">

    <!-- dekorasi blob -->
    <div class="float-slow absolute -top-20 -left-20 w-72 h-72 rounded-full bg-peach/70 blur-3xl"></div>
    <div class="float-slower absolute top-1/3 -right-24 w-80 h-80 rounded-full bg-mint/70 blur-3xl"></div>
    <div class="float-slow absolute -bottom-24 left-1/4 w-72 h-72 rounded-full bg-sky/80 blur-3xl"></div>

    <main class="relative z-10 min-h-screen flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-md">

            <div class="bg-white/60 backdrop-blur-xl border border-white/70 rounded-[2rem] shadow-2xl shadow-lavender/50 p-8 sm:p-10">

                <!-- header -->
                <div class="text-center mb-8">
                    <div class="mx-auto mb-4 w-16 h-16 rounded-2xl bg-gradient-to-br from-lavender to-blush flex items-center justify-center shadow-lg shadow-lavender/60">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-bold">Selamat Datang 👋</h1>
                    <p class="text-sm text-ink/60 mt-1">Silakan login untuk masuk ke dashboard</p>
                </div>

                <!-- alert sukses (misal setelah logout) -->
                @if (session('success'))
                    <div id="alert-success" class="mb-5 flex items-start gap-3 rounded-2xl bg-mint/80 border border-mint px-4 py-3 text-sm text-emerald-800">
                        <span class="text-lg leading-none">✅</span>
                        <p class="flex-1">{{ session('success') }}</p>
                        <button type="button" onclick="document.getElementById('alert-success').remove()" class="text-emerald-800/60 hover:text-emerald-900">&times;</button>
                    </div>
                @endif

                <!-- alert error umum (misal akses halaman tanpa login) -->
                @if (session('error'))
                    <div id="alert-error" class="mb-5 flex items-start gap-3 rounded-2xl bg-peach/90 border border-orange-200 px-4 py-3 text-sm text-orange-800">
                        <span class="text-lg leading-none">⚠️</span>
                        <p class="flex-1">{{ session('error') }}</p>
                        <button type="button" onclick="document.getElementById('alert-error').remove()" class="text-orange-800/60 hover:text-orange-900">&times;</button>
                    </div>
                @endif

                <!-- alert error validasi / login gagal -->
                @if ($errors->any())
                    <div id="alert-validation" class="mb-5 flex items-start gap-3 rounded-2xl bg-blush/90 border border-pink-200 px-4 py-3 text-sm text-rose-800">
                        <span class="text-lg leading-none">🚫</span>
                        <ul class="flex-1 list-disc list-inside space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" onclick="document.getElementById('alert-validation').remove()" class="text-rose-800/60 hover:text-rose-900">&times;</button>
                    </div>
                @endif

                <!-- form -->
                <form method="POST" action="/login" class="space-y-5" novalidate>
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium mb-1.5">Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-4 flex items-center text-ink/40">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Masukan Email" autocomplete="email" autofocus
                                class="w-full pl-12 pr-4 py-3 rounded-2xl bg-white/80 border @error('email') border-rose-300 @else border-lavender/60 @enderror placeholder-ink/30 focus:outline-none focus:ring-4 focus:ring-lavender/50 focus:border-lavender transition">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium mb-1.5">Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-4 flex items-center text-ink/40">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input type="password" id="password" name="password" placeholder="Password Anda" autocomplete="current-password"
                                class="w-full pl-12 pr-12 py-3 rounded-2xl bg-white/80 border @error('password') border-rose-300 @else border-lavender/60 @enderror placeholder-ink/30 focus:outline-none focus:ring-4 focus:ring-lavender/50 focus:border-lavender transition">
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-4 flex items-center text-ink/40 hover:text-ink/70 text-sm" aria-label="Tampilkan password">👁️</button>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full py-3.5 rounded-2xl font-semibold text-white bg-gradient-to-r from-lavender via-[#b9a4ff] to-[#ffb3d4] shadow-lg shadow-lavender/60 hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 focus:outline-none focus:ring-4 focus:ring-lavender/50 transition">
                        LOGIN
                    </button>
                </form>

                <p class="text-center text-xs text-ink/50 mt-8">Hanya pengguna terdaftar yang dapat mengakses dashboard.</p>
            </div>
        </div>
    </main>

    <script>
        const pwd = document.getElementById('password');
        const toggle = document.getElementById('togglePassword');
        toggle.addEventListener('click', function () {
            const show = pwd.type === 'password';
            pwd.type = show ? 'text' : 'password';
            toggle.textContent = show ? '🙈' : '👁️';
        });
    </script>
</body>
</html>