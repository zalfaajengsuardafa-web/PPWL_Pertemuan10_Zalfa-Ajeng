<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pengaturan Standar Autentikasi (Authentication Defaults)
    |--------------------------------------------------------------------------
    |
    | Pada bagian ini, sistem menentukan guard dan mekanisme reset password bawaan.
    | Secara default, aplikasi menggunakan guard 'web' untuk menangani autentikasi pengguna
    | dan menggunakan konfigurasi 'users' untuk penanganan lupa/reset password.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Pengawal Autentikasi (Authentication Guards)
    |--------------------------------------------------------------------------
    |
    | Guard bertugas mendefinisikan bagaimana sistem mengenali dan memverifikasi identitas pengguna.
    | Konfigurasi guard 'web' di bawah ini menggunakan:
    | - driver 'session'  : Status login pengguna disimpan dan dikelola melalui sesi browser.
    |                       (Masa berlaku masa aktif sesi ini diatur di .env via SESSION_LIFETIME=120,
    |                        yang berarti sesi/kartu akses pengguna berlaku selama 120 menit).
    | - provider 'users' : Mengarahkan guard untuk mengambil sumber data identitas pengguna dari konfigurasi provider 'users'.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Penyedia Data Pengguna (User Providers)
    |--------------------------------------------------------------------------
    |
    | Provider menentukan metode pengambilan data pengguna dari database.
    | Di sini digunakan driver 'eloquent' dengan model `App\Models\User::class`, yang secara otomatis
    | menjembatani query autentikasi langsung ke tabel 'users' di dalam database.
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Konfigurasi Reset Password (Resetting Passwords)
    |--------------------------------------------------------------------------
    |
    | Mengatur token reset kata sandi untuk pengguna:
    | - provider : Mengacu pada penyedia data 'users'.
    | - table    : Menyimpan token sementara pada tabel 'password_reset_tokens'.
    | - expire   : Masalah keamanan di mana masa berlaku token reset dibatasi selama 60 menit.
    | - throttle : Pencegahan brute-force (spamming) dengan memberi jeda waktu 60 detik sebelum dapat meminta token baru.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Batas Waktu Konfirmasi Password (Password Confirmation Timeout)
    |--------------------------------------------------------------------------
    |
    | Mengatur durasi waktu (dalam detik) sebelum sistem meminta pengguna memasukkan ulang kata sandi
    | saat mengakses tindakan sensitif. Nilai 10800 detik setara dengan 3 jam.
    |
    */

    'password_timeout' => 10800,

];