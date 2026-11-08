<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | Controller ini bertanggung jawab menangani seluruh alur registrasi pengguna baru.
    | Dengan memanfaatkan trait `RegistersUsers`, Laravel secara otomatis menyediakan
    | logika penanganan HTTP request untuk pendaftaran tanpa perlu menuliskan metode manual.
    |
    */

    use RegistersUsers;

    /**
     * Jalur pengalihan (redirect) setelah pengguna berhasil melakukan registrasi.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Konstruktor Controller.
     * Menetapkan middleware 'guest' untuk memastikan bahwa pengguna yang sudah login
     * tidak dapat mengakses kembali formulir pendaftaran ini.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Memvalidasi data masukan dari formulir pendaftaran sebelum disimpan.
     *
     * Penjelasan Aturan Validasi untuk Presentasi:
     * - Aturan 'unique:users' pada email memastikan tidak ada dua akun yang terdaftar
     *   menggunakan alamat email yang sama di dalam database.
     * - Aturan 'min:8' pada password mewajibkan kata sandi memiliki panjang minimal 8 karakter demi keamanan.
     * - Aturan 'confirmed' memastikan nilai input password harus sama persis dengan field 'password_confirmation'.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Membuat dan menyimpan instance data User baru ke database setelah lolos validasi.
     * - Baris `Hash::make($data['password'])` berfungsi mengubah kata sandi mentah menjadi
     *   deretan kode acak satu arah menggunakan algoritma Bcrypt.
     * - Proses hashing ini tidak dapat dikembalikan ke bentuk asalnya (irreversible). Tujuannya
     *   adalah menjaga keamanan data pengguna jika terjadi kebocoran basis data.
     * - Berdasarkan pembuktian di phpMyAdmin, kolom 'password' pada tabel 'users' berisi string
     *   acak yang selalu diawali dengan prefix `$2y$`, bukan teks kata sandi asli.
     * - Pada saat proses login, Laravel tidak membongkar atau mendekripsi hash tersebut, melainkan
     *   mengubah kata sandi yang diketik pengguna menjadi hash baru lalu membandingkan hasilnya.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}