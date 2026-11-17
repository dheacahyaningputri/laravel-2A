@extends('template.dashboard')

@section('title', $judul)

@section('content')
<section class="page-heading">
    <div>
        <p class="eyebrow"><span aria-hidden="true"></span> ALAT BELAJAR</p>
        <h1>{{ $judul }}</h1>
        <p class="page-description">Masukkan ukuran segitiga untuk mengetahui luasnya.</p>
    </div>
</section>

<div class="calculator-layout">
    <section class="card calculator-card" aria-labelledby="calculator-heading">
        <div class="card-heading">
            <span class="card-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M4 19 12 5l8 14H4Z" />
                    <path d="M8.2 16.3h7.6" />
                </svg>
            </span>
            <div>
                <h2 id="calculator-heading">Hitung luas</h2>
                <p class="sub">Isi alas dan tinggi segitiga.</p>
            </div>
        </div>

        @if ($errors->any())
            <div class="error" role="alert">
                <strong>Periksa kembali ukuran yang dimasukkan.</strong>
                @foreach ($errors->all() as $pesan)
                    <div>{{ $pesan }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('kalkulator.hitung') }}" method="post">
            @csrf
            <div class="field">
                <label for="alas">Alas <span>(satuan)</span></label>
                <input
                    type="number"
                    step="any"
                    min="0"
                    id="alas"
                    name="alas"
                    value="{{ old('alas', $alas) }}"
                    placeholder="Contoh: 10"
                    required
                    @if ($errors->has('alas')) aria-invalid="true" @endif
                >
            </div>
            <div class="field">
                <label for="tinggi">Tinggi <span>(satuan)</span></label>
                <input
                    type="number"
                    step="any"
                    min="0"
                    id="tinggi"
                    name="tinggi"
                    value="{{ old('tinggi', $tinggi) }}"
                    placeholder="Contoh: 6"
                    required
                    @if ($errors->has('tinggi')) aria-invalid="true" @endif
                >
            </div>
            <button type="submit" class="btn">
                Hitung luas
                <span aria-hidden="true">→</span>
            </button>
        </form>

        @if ($hasil !== null)
            <div class="result" role="status" aria-live="polite">
                <span class="result-label">Luas segitiga</span>
                <strong>{{ $hasil }}</strong>
                <small>L = ½ × {{ $alas }} × {{ $tinggi }}</small>
            </div>
        @endif
    </section>

    <aside class="formula-card" aria-label="Rumus luas segitiga">
        <div class="formula-art" aria-hidden="true">
            <span class="formula-orbit orbit-one"></span>
            <span class="formula-orbit orbit-two"></span>
            <svg viewBox="0 0 120 108" fill="none">
                <path d="m60 12 46 82H14L60 12Z" />
                <path d="M60 12v82M40 94h40" />
                <circle cx="60" cy="12" r="4" />
            </svg>
        </div>
        <p class="formula-kicker">INGAT RUMUSNYA</p>
        <h2>Luas = ½ × alas × tinggi</h2>
        <p>Kalikan alas dengan tinggi, lalu bagi hasilnya menjadi dua.</p>
        <div class="formula-divider"></div>
        <div class="formula-tip">
            <span aria-hidden="true">✦</span>
            Pastikan alas dan tinggi memakai satuan yang sama.
        </div>
    </aside>
</div>
@endsection