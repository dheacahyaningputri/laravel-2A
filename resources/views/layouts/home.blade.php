@extends('layouts.olshop')

@section('content')
<div class="hero text-center">
    {{-- Tambahkan gambar/ikon di bawah ini --}}
    <img src="https://flaticon.com" 
         alt="Icon Olshop" 
         class="mb-3" 
         style="width: 100px; height: auto;">

    <h1 class="display-5 fw-bold">Selamat Datang di Olshop Kami</h1>
    <p class="lead mb-4">Belanja sepatu, baju, dan celana favoritmu dengan harga terbaik.</p>
    <a href="/product" class="btn btn-light rounded-pill px-4 fw-semibold">Lihat Produk</a>
</div>
@endsection
