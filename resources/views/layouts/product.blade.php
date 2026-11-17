@extends('layouts.olshop')

@section('content')
<h2 class="fw-bold mb-4">Daftar Produk</h2>

@php
    // Cukup tempelkan link gambar dari Google di dalam tanda petik di bawah ini
    $gambarProduk = [
        'Sepatu' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_hlMzQHyTs0J50XMhP3zMcN0PKnqF7R3IzI2jwP76xA&s',
        'Baju'   => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQv7kNA3up2Mk5fPoFhbbGF1ommWLxVS13bKQe9yw76ZQ&s=10',
        'Celana' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaB3QnR8IU43PIn9sda98o7n9yrBCJ5hR6V8sop0pqDg&s=10',
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
