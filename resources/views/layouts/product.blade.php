@extends('layouts.olshop')

@section('content')
<h2 class="fw-bold mb-4">Daftar Produk</h2>

@php
    // Cukup tempelkan link gambar dari Google di dalam tanda petik di bawah ini
    $gambarProduk = [
        'Sepatu' => 'PASTE_LINK_GAMBAR_SEPATU_DARI_GOOGLE_DISINI',
        'Baju'   => 'PASTE_LINK_GAMBAR_BAJU_DARI_GOOGLE_DISINI',
        'Celana' => 'PASTE_LINK_GAMBAR_CELANA_DARI_GOOGLE_DISINI',
    ];
    
    // Gambar cadangan jika nama produk di controller berbeda atau link error
    $gambarDefault = 'https://flaticon.com';
@endphp

<div class="row g-4">
    @foreach ($produk as $nama => $harga)
    <div class="col-md-4">
        <div class="card card-produk h-100 overflow-hidden">
            <img src="{{ $gambarProduk[$nama] ?? $gambarDefault }}" 
                 alt="{{ $nama }}" 
                 style="width: 100%; height: 220px; object-fit: cover;">

            <div class="card-body p-4 text-center">
                <h4 class="fw-bold">{{ $nama }}</h4>
                <p class="text-muted">Klik untuk melihat harga</p>
                <a href="/produk/detail/{{ $harga }}" class="btn btn-olshop">Lihat Detail</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
