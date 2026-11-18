<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//load Model User
use App\Models\User;
//load HASH untuk cek password
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //fungsi untuk login
    public function cek(Request $request)
    {
        //validasi input form
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        //mencari data email di table users
        $data = User::where('email', $request->email)->first();

        //jika email tidak ditemukan atau password salah
        if (!$data || !Hash::check($request->password, $data->password)) {
            return redirect('/')
                ->withErrors(['email' => 'Email atau password yang Anda masukkan salah.'])
                ->withInput($request->only('email'));
        }

        //buat ulang session id (mencegah session fixation)
        $request->session()->regenerate();

        //simpan session
        session(['email' => $data->email]);
        session(['nama' => $data->nama]);
        session(['role' => $data->role]);
        session(['logged_in' => true]);

        //masuk ke dashboard
        return redirect('/dashboard');
    }

    //fungsi untuk logout
    public function logout(Request $request)
    {
        //hapus semua session
        $request->session()->flush();
        $request->session()->regenerateToken();

        //kembali ke login
        return redirect('/')->with('success', 'Anda berhasil logout. Sampai jumpa lagi!');
    }
}