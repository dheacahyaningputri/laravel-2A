<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function segitiga(): View
    {
        $data['judul'] = 'Kalkulator Luas Segitiga';
        $data['alas'] = null;
        $data['tinggi'] = null;
        $data['hasil'] = null;

        return view('kalkulatorsegitiga', $data);
    }

    public function hitungSegitiga(Request $request): View
    {
        $valid = $request->validate([
            'alas' => 'required|numeric|min:0',
            'tinggi' => 'required|numeric|min:0',
        ], [
            'alas.required' => 'Alas wajib diisi.',
            'alas.numeric' => 'Alas harus berupa angka.',
            'tinggi.required' => 'Tinggi wajib diisi.',
            'tinggi.numeric' => 'Tinggi harus berupa angka.',
        ]);

        $luas = 0.5 * (float) $valid['alas'] * (float) $valid['tinggi'];

        $data['judul'] = 'Kalkulator Luas Segitiga';
        $data['alas'] = $valid['alas'];
        $data['tinggi'] = $valid['tinggi'];
        // 30,00 menjadi 30 ; 12,50 menjadi 12,5
        $data['hasil'] = rtrim(rtrim(number_format($luas, 2, ',', '.'), '0'), ',');

        return view('kalkulatorsegitiga', $data);
    }
}
