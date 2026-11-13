@extends('layouts.olshop')

@section('content')
<h2 class="fw-bold mb-4">Daftar Produk</h2>
<div class="row g-4">
    @foreach ($produk as $nama => $harga)
    <div class="col-md-4">
        <div class="card card-produk h-100">
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