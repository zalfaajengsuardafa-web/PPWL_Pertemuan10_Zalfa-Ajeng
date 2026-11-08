<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Di-import kalau sewaktu-waktu mau ngerubah/override method bawaan

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | Controller ini tugasnya megang urusan login sama logout user.
    | Pas user berhasil login, dia bakal dilempar ke halaman home.
    | Semua logika ribet kayak cek password & session udah diurusin
    | otomatis sama trait `AuthenticatesUsers` bawaan Laravel.
    |
    */

    // Pake trait AuthenticatesUsers biar ga perlu nulis fungsi login/logout manual dari nol
    use AuthenticatesUsers;

    /**
     * Nentukan user mau lempar ke mana abis BERHASIL LOGIN.
     * Default-nya dilesatin ke '/home'.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Set up middleware buat ngatur hak akses route login & logout.
     *
     * @return void
     */
    public function __construct()
    {
        // Middleware 'guest': Cuma user yang BELUM login yang boleh buka halaman login.
        // `.except('logout')` artinya aturan ini berlaku buat semuanya KECUALI pas mau logout.
        $this->middleware('guest')->except('logout');

        // Middleware 'auth': Sebaliknya, tombol/fungsi logout CUMA BISA diakses kalau user-nya emang SUDAH login.
        $this->middleware('auth')->only('logout');
    }

    /*
    | OPSIONAL: KELAR LOGOUT LANGSUNG ARAHIN KE REGISTER
    */

    /*
    protected function loggedOut(Request $request)
    {
        // Abis session-nya dibersihin, langsung lempar ke form register
        return redirect()->route('register'); 
        
        // Atau kalau mau pake path URL biasa:
        // return redirect('/register');
    }
    */
}