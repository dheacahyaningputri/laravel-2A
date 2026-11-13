<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    private array $produk = [
        'Sepatu' => 300000,
        'Baju'   => 200000,
        'Celana' => 150000,
    ];

    public function home()
    {
        return view('layouts.home', ['judul' => 'Home']); // Ubah olshop menjadi layouts
    }

    public function product()
    {
        return view('layouts.product', [ // Ubah olshop menjadi layouts
            'judul'  => 'Product',
            'produk' => $this->produk,
        ]);
    }

    public function detail($harga)
    {
        $nama = array_search((int) $harga, $this->produk, true);
        abort_if($nama === false, 404, 'Produk tidak ditemukan');

        return view('layouts.detail', [ // Ubah olshop menjadi layouts
            'judul' => 'Detail ' . $nama,
            'nama'  => $nama,
            'harga' => (int) $harga,
        ]);
    }

    public function about()
    {
        return view('layouts.about', ['judul' => 'About']); // Ubah olshop menjadi layouts
    }
}
