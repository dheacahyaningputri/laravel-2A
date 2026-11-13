<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class MahasiswaController extends Controller
{
    public function index(): View
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mahasiswa'] = [
            ['nama' => 'Anton', 'alamat' => 'Surabaya', 'gender' => 'L'],
            ['nama' => 'Budi',  'alamat' => 'Kediri',   'gender' => 'L'],
            ['nama' => 'Ani',   'alamat' => 'Malang',   'gender' => 'P'],
            ['nama' => 'Sinta', 'alamat' => 'Surabaya', 'gender' => 'P'],
        ];

        return view('mahasiswa', $data);
    }
}
