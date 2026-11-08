<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    | Controller ini bertugas menangani proses konfirmasi kata sandi pengguna 
    | sebelum mereka diperbolehkan mengakses halaman atau tindakan sensitif.
    | Controller ini memanfaatkan trait `ConfirmsPasswords` bawaan Laravel/UI.
    |
    */

    // Menggunakan trait ConfirmsPasswords untuk menyediakan logika tampilan
    // serta verifikasi kata sandi secara otomatis tanpa perlu menulis kode manual.
    use ConfirmsPasswords;

    /**
     * Jalur pengalihan (redirect) default jika URL tujuan awal pengguna tidak ditemukan.
     * Setelah kata sandi berhasil dikonfirmasi, pengguna akan diarahkan ke '/home'.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Konstruktor Controller.
     * Menetapkan middleware 'auth' agar hanya pengguna yang sudah login
     * yang dapat mengakses fitur konfirmasi kata sandi ini.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}