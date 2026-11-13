@extends('layouts.olshop')

@section('content')
<a href="/product" class="text-decoration-none">&larr; Kembali ke Product</a>
<div class="card card-produk mt-3">
    <div class="card-body p-5 text-center">
        <p class="text-uppercase text-muted small mb-1">Detail Produk</p>
        <h1 class="fw-bold" style="color:#4f46e5">{{ $nama }} - {{ number_format($harga, 0, ',', '.') }}</h1>
        <p class="text-muted mb-0">Harga: Rp {{ number_format($harga, 0, ',', '.') }}</p>
    </div>
</div>
@endsection