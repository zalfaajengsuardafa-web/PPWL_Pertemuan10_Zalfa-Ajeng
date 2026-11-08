<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



### 1. Pembukaan

"Selamat pagi, Pak. Pada pertemuan sembilan ini saya mengerjakan materi authentication. Kalau dijelaskan sederhana, authentication adalah cara aplikasi memastikan bahwa orang yang masuk benar-benar orang yang berhak, seperti saat kita login ke aplikasi bank. Proyek yang saya pakai adalah aplikasi data buku dari pertemuan sebelumnya. Sebelumnya, siapa pun yang tahu alamat halamannya bisa langsung melihat dan mengubah data buku. Minggu ini aplikasi itu saya amankan dengan sistem login. Di bawah ini saya jelaskan urutan pengerjaannya sekaligus kodenya."

### 2. Langkah 1: Memasang fitur login

"Langkah pertama, saya memasang paket bernama laravel/ui dengan perintah `composer require laravel/ui --dev`. Paket ini ibarat kit siap rakit untuk fitur login. Kalau dibuat dari nol, saya harus menulis halaman login, pengecekan akun, dan pengamanannya satu per satu. Dengan paket ini, semuanya tersedia dari satu perintah. Tambahan `--dev` membuat paket ini dicatat sebagai kebutuhan pengembangan saja di file composer.json.

Setelah itu saya menjalankan `php artisan ui bootstrap --auth`. Saya memilih `bootstrap` dan bukan `vue`, karena tampilan proyek saya sudah memakai Bootstrap, jadi tidak perlu membawa teknologi tambahan yang tidak dipakai. Perintah ini otomatis membuat controller login, halaman login, dan daftar alamat (route) untuk login dan logout.

Berikutnya saya menjalankan `npm install` dan `npm run build`. Langkah ini wajib karena tampilan bawaan butuh file CSS dan JavaScript yang harus 'dimasak' dulu oleh Vite. Kalau dilewati, halaman login muncul tanpa gaya sama sekali. Terakhir, `php artisan migrate` memastikan tabel `users` ada di database, karena di tabel itulah daftar akun disimpan."

### 3. Langkah 2: Cara kerja login dan penyimpanan kata sandi

"Sebelum lanjut, saya jelaskan dulu cara kerja login. Bayangkan sebuah gedung dengan satpam. Pengunjung menunjukkan KTP, yaitu email dan kata sandi. Satpam mencocokkannya dengan daftar tamu, yaitu tabel `users`, lalu memberi kartu akses sementara. Kartu akses ini di Laravel disebut session.

*(tampilkan config/auth.php dan .env)*

Di file `config/auth.php`, pengaturannya berbunyi `'driver' => 'session'` dan `'provider' => 'users'`. Artinya, status login disimpan lewat session dan data akunnya diambil dari tabel `users`. Di file `.env`, `SESSION_LIFETIME=120` berarti kartu akses berlaku 120 menit.

*(tampilkan RegisterController)*

Soal kata sandi, di `RegisterController` ada baris `Hash::make($data['password'])`. Baris ini mengubah kata sandi menjadi deretan kode acak yang tidak bisa dikembalikan ke bentuk asalnya, memakai algoritma Bcrypt. Alasannya keamanan: kalau suatu hari database bocor, kata sandi asli pengguna tetap tidak terbaca. Saya sudah membuktikannya di phpMyAdmin, kolom password berisi kode acak yang diawali `$2y$`, bukan kata sandi asli. Saat login, Laravel tidak membongkar kode itu. Ia hanya mengubah kata sandi yang diketik menjadi kode lalu membandingkan kedua kode tersebut.

Di controller yang sama ada aturan validasi: `min:8` agar kata sandi minimal 8 karakter, `confirmed` agar harus sama dengan isian konfirmasi, dan `unique:users` agar tidak ada dua akun dengan email yang sama."

### 4. Langkah 3: Menyesuaikan halaman home

*(tampilkan HomeController dan home.blade.php)*

"Setelah login berhasil, pengguna diarahkan ke halaman home. Di `HomeController`, saya memakai `Buku::count()` untuk menghitung jumlah buku, lalu mengirim angkanya ke tampilan dengan `compact('jumlah_buku')`. Perhitungan sengaja saya taruh di controller, bukan di tampilan, supaya tampilan hanya bertugas menampilkan dan pengolahan data tetap di tempatnya.

Di `home.blade.php`, sapaan memakai `Auth::user()->name`. Kode ini mengambil nama akun yang sedang login. Ini bukti bahwa Laravel benar-benar mengenali siapa penggunanya, karena nama yang tampil adalah nama dari akun yang masuk, bukan tulisan tetap."

### 5. Langkah 4: Mengurangi fitur bawaan

"Di langkah ini saya menghapus fitur yang tidak perlu. Remember Me saya hilangkan karena fitur itu menyimpan tanda login di cookie yang bertahan lama, jadi berisiko kalau komputer dipakai bergantian. Lupa Kata Sandi saya hilangkan karena membutuhkan pengiriman email yang belum disiapkan. Registrasi saya tutup karena akun nantinya dibuat oleh admin.

*(tampilkan routes/web.php, bagian Auth::routes)*

```php
Auth::routes([
    'register' => false,
    'reset'    => false,
]);
```

Satu baris `Auth::routes` ini mendaftarkan semua alamat autentikasi sekaligus. Dengan `register` dan `reset` bernilai `false`, alamat pendaftaran dan reset kata sandi tidak dibuat sama sekali. Ini penting: kalau saya hanya menyembunyikan tombolnya, orang masih bisa mengetik `/register` langsung di browser. Saya sudah menguji dan hasilnya halaman 404, artinya route-nya benar-benar tidak ada.

*(tampilkan login.blade.php)*

Di halaman login, tautan 'Lupa kata sandi' dan 'Daftar' dibungkus `@if (Route::has(...))`. Maksudnya, tautan hanya muncul kalau route-nya ada. Karena route sudah dimatikan, tautannya hilang otomatis tanpa saya hapus manual."

### 6. Langkah 5: Membatasi akses halaman

*(tampilkan routes/web.php, bagian group)*

```php
Route::middleware('auth')->group(function () {
    Route::get('/home', ...);
    Route::get('/buku', ...);
    // dan seterusnya
});
```

"Ini bagian paling penting dari pertemuan ini. Middleware adalah lapisan penyaring yang memeriksa setiap permintaan sebelum sampai ke halaman. Middleware `auth` bertugas seperti satpam di pintu masuk: ia memeriksa apakah pengguna sudah login. Kalau belum, ia mengarahkan pengguna ke halaman login. Pengalihan itu diatur di file `Authenticate.php` lewat `route('login')`.

Alasan saya memakai `group` adalah agar aturan satpam cukup ditulis sekali dan berlaku untuk semua route di dalamnya, jadi tidak ada halaman yang terlewat. Route login sengaja saya taruh di luar group, karena orang harus bisa membuka halaman login sebelum mereka punya akses.

Ada juga `Route::redirect('/', '/home')`, supaya orang yang membuka alamat utama langsung diarahkan ke home, dan kalau belum login otomatis dilempar ke login.

Pengujiannya dua kali. Pertama, saya mengetik `localhost:8000/buku` tanpa login, dan browser langsung memindahkan saya ke halaman login. Kedua, setelah login, halaman buku terbuka normal."

### 7. Langkah 6: Pengamanan form dan pesan error

*(tampilkan login.blade.php dan lang/id/auth.php)*

"Di form login ada `@csrf`. Ini token rahasia yang membuktikan bahwa form benar-benar dikirim dari halaman kita, bukan dari situs palsu yang menyamar. Tanpa token, Laravel menolak permintaannya. Token yang sama ada di form hapus buku dan form logout.

Tombol logout sengaja berupa form dengan metode POST, bukan link biasa. Alasannya, logout mengubah status login, dan aksi seperti itu tidak boleh bisa dipicu hanya dengan mengeklik link.

Untuk pesan kesalahan, di `lang/id/auth.php` saya menulis 'Email atau kata sandi yang Anda masukkan salah.' Pesan ini sengaja tidak menyebut mana yang salah, supaya orang jahat tidak bisa menebak email mana yang terdaftar. Pesannya tampil di halaman lewat `$errors->first()`, dan `old('email')` menjaga email yang sudah diketik supaya tidak hilang saat login gagal. Bahasa aplikasi diatur lewat `APP_LOCALE=id`."

### 8. Langkah 7: Mengganti tampilan dengan SB Admin

*(tampilkan layouts/master.blade.php)*

"Setelah fungsinya beres, saya mengganti tampilan memakai templat SB Admin. Kuncinya ada di satu file bernama `layouts/master.blade.php`. File ini berisi navbar, sidebar, dan footer. Di bagian tengahnya ada `@yield('content')`, yaitu tempat kosong yang diisi oleh halaman lain. Halaman lain cukup menulis `@extends('layouts.master')`, lalu isinya masuk ke tempat itu.

Keuntungannya besar. Kalau ingin mengganti desain, saya cukup mengubah satu file dan semua halaman ikut berubah. Menu yang sedang dibuka ditandai otomatis dengan `request()->routeIs('buku.*')`. Nama pengguna di navbar dibungkus `@auth`, jadi hanya tampil kalau ada yang login.

Halaman login sengaja tidak memakai layout ini karena tidak membutuhkan sidebar, jadi saya buat mandiri dengan gaya SB Admin: latar biru dan kartu di tengah. Satu hal yang saya perhatikan, nama isian tetap `email` dan `password`, karena itulah nama yang dibaca controller login bawaan Laravel. Kalau saya ganti, loginnya tidak akan berfungsi."

### 9. Langkah 8: Data buku, validasi, dan pagination

*(tampilkan BukuController)*

"Halaman data buku sudah dilindungi login, dan saya menyempurnakannya. Di `BukuController`, daftar buku diambil dengan `orderBy('id','desc')->paginate(5)`. Artinya data terbaru tampil paling atas dan dibagi lima per halaman, supaya halaman tidak panjang kalau datanya banyak. Nomor urut tabel dihitung dengan `(halaman saat ini - 1) * jumlah per halaman`, jadi di halaman dua nomornya lanjut dari enam, bukan mengulang dari satu. Agar tombol halamannya bergaya Bootstrap, di `AppServiceProvider` saya menambahkan `Paginator::useBootstrapFive()`.

Untuk menyimpan dan mengubah data, ada aturan validasi seperti `required`, `numeric`, dan `date`. Aturan ini memastikan data kosong atau salah format ditolak sebelum masuk database. Kalau gagal, pesan error tampil dalam bahasa Indonesia berkat file `lang/id/validation.php`, dan isian lama tetap terisi lewat `old()`, jadi pengguna tidak perlu mengetik ulang.

Di form edit ada `@method('PUT')` dan di tombol hapus ada `@method('DELETE')`. Alasannya, form HTML biasa hanya mengenal GET dan POST, jadi dua perintah itu perlu 'disamarkan' supaya cocok dengan route. Tombol hapus juga memakai `confirm()` supaya tidak terhapus karena salah pencet.

*(tampilkan Models/Buku.php)*

Di model `Buku`, `$fillable` mendaftar kolom yang boleh diisi massal, sebagai pengaman supaya tidak ada kolom lain yang bisa diubah sembarangan. `$casts` mengubah `tgl_terbit` menjadi tanggal sungguhan, agar bisa ditampilkan dalam format hari/bulan/tahun. Di tabel, harga ditampilkan sebagai rupiah lewat `number_format`, dan kalau data kosong, `@forelse` menampilkan pesan 'Belum ada data buku' supaya tabel tidak tampil kosong tanpa keterangan.

Untuk menguji pagination, saya membuat `BukuSeeder` yang mengisi 18 buku contoh, sehingga datanya terbagi menjadi empat halaman. Seeder ini dijalankan dengan `php artisan db:seed --class=BukuSeeder`."

### 10. Langkah 9: Tampilan di layar kecil

"Terakhir, saya menguji tampilan di layar kecil. Di layout ada aturan CSS khusus layar di bawah 992 piksel: sidebar tersembunyi dan muncul lewat tombol tiga garis, dan tabel dibungkus `table-responsive` sehingga bisa digeser ke samping di HP. Dengan begitu, aplikasinya tetap nyaman dibuka dari ponsel."

### 11. Kendala

"Kendala utama saya adalah modul ditulis untuk Laravel 7, sedangkan proyek saya memakai Laravel 10. Beberapa hal berbeda, misalnya aset sekarang diproses Vite, dan nomor baris di modul sudah bergeser, jadi saya mencari bagian kode berdasarkan isinya. Saya juga sempat memastikan bahwa file `jquery` dan `datepicker` dari pertemuan sebelumnya tetap terpanggil, karena form tambah buku masih membutuhkannya."

### 12. Penutup dan kesimpulan

"Kesimpulannya, dari pertemuan ini saya memahami bahwa login bukan sekadar formulir dengan dua isian. Di baliknya ada session sebagai kartu akses, hash untuk mengamankan kata sandi, token CSRF untuk melindungi form, dan middleware sebagai satpam yang menjaga halaman. Hasil akhirnya, aplikasi data buku saya hanya bisa diakses pengguna yang sudah login, dengan tampilan yang rapi, konsisten, dan nyaman dibuka di laptop maupun HP. Terima kasih, Pak."