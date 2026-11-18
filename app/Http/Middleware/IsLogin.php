<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //cek apakah ada session logged_in
        if (!session('logged_in')) {
            //jika tidak ada maka kembali ke halaman login
            return redirect('/')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman tersebut.');
        }

        $response = $next($request);

        //cegah halaman tersimpan di cache browser (tombol back setelah logout)
        return $response
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sun, 02 Jan 1990 00:00:00 GMT');
    }
}