<aside class="sidebar" aria-label="Navigasi utama">
    <p class="sidebar-label">MENU UTAMA</p>

    <nav class="sidebar-nav">
        <a
            href="{{ route('mahasiswa.index') }}"
            class="sidebar-link {{ request()->routeIs('mahasiswa.index') ? 'active' : '' }}"
            @if (request()->routeIs('mahasiswa.index')) aria-current="page" @endif
        >
            <span class="nav-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M16 20v-1.6a3.4 3.4 0 0 0-3.4-3.4H6.4A3.4 3.4 0 0 0 3 18.4V20" />
                    <circle cx="9.5" cy="7" r="3.5" />
                    <path d="M17 3.7a3.5 3.5 0 0 1 0 6.7M21 20v-1.6a3.4 3.4 0 0 0-2.6-3.3" />
                </svg>
            </span>
            <span>Daftar Mahasiswa</span>
            <span class="nav-arrow" aria-hidden="true">↗</span>
        </a>

        <a
            href="{{ route('kalkulator.segitiga') }}"
            class="sidebar-link {{ request()->routeIs('kalkulator.*') ? 'active' : '' }}"
            @if (request()->routeIs('kalkulator.*')) aria-current="page" @endif
        >
            <span class="nav-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M4 19 12 5l8 14H4Z" />
                    <path d="M8.2 16.3h7.6M12 12.5v3.8" />
                </svg>
            </span>
            <span>Kalkulator Segitiga</span>
            <span class="nav-arrow" aria-hidden="true">↗</span>
        </a>
    </nav>

    <div class="sidebar-note">
        <span class="note-spark" aria-hidden="true">✦</span>
        <p>Ruang kecil untuk belajar hal besar.</p>
        <span>Semangat hari ini!</span>
    </div>
</aside>
