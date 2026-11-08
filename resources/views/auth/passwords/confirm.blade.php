<!DOCTYPE html>
{{-- Mengatur bahasa dokumen ke Bahasa Indonesia --}}
<html lang="id">
<head>
    <meta charset="utf-8">
    {{-- Meta viewport wajib ada agar tampilan responsif di layar ponsel maupun desktop --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konfirmasi Kata Sandi - Data Buku</title>

    {{-- Mengimpor stylesheet SB Admin dari folder public/sbadmin/css/styles.css --}}
    <link rel="stylesheet" href="{{ asset('sbadmin/css/styles.css') }}">
</head>

{{-- Latar belakang biru (bg-primary) disesuaikan dengan halaman login, register, dan reset password --}}
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                {{-- Memposisikan kartu formulir di tengah layar --}}
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        {{-- Kartu utama dengan efek bayangan (shadow-lg) dan sudut membulat --}}
                        <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                            
                            {{-- Header Kartu Konfirmasi Password --}}
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Konfirmasi Kata Sandi</h3>
                            </div>

                            {{-- Isi Badan Kartu --}}
                            <div class="card-body">
                                {{-- Pesan petunjuk keamanan sebelum melanjutkan --}}
                                <div class="small mb-3 text-muted">
                                    Harap konfirmasi kata sandi Anda sebelum melanjutkan ke area sensitif.
                                </div>

                                {{-- Menampilkan alert jika kata sandi yang dimasukkan salah --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        {{ $errors->first() }}
                                    </div>
                                @endif

                                {{-- Form dikirim ke rute password.confirm bawaan laravel/ui dengan metode POST --}}
                                <form method="POST" action="{{ route('password.confirm') }}">
                                    {{-- Token CSRF wajib ada untuk keamanan dari serangan Cross-Site Request Forgery --}}
                                    @csrf

                                    {{-- Input Kata Sandi dengan tampilan melayang (Floating Label) --}}
                                    <div class="form-floating mb-3">
                                        <input id="password" 
                                               type="password" 
                                               name="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               placeholder="Kata Sandi Saat Ini" 
                                               required 
                                               autocomplete="current-password"
                                               autofocus>
                                        <label for="password">Kata Sandi Saat Ini</label>
                                    </div>

                                    {{-- Baris untuk tombol submit dan link Lupa Password --}}
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        {{-- Menampilkan tautan Lupa Kata Sandi jika rutenya aktif --}}
                                        @if (Route::has('password.request'))
                                            <a class="small text-decoration-none" href="{{ route('password.request') }}">
                                                Lupa kata sandi?
                                            </a>
                                        @else
                                            <div></div>
                                        @endif

                                        {{-- Tombol untuk memproses konfirmasi --}}
                                        <button type="submit" class="btn btn-primary px-4">
                                            Konfirmasi
                                        </button>
                                    </div>
                                </form>
                            </div>

                            {{-- Footer Kartu: Identitas Matakuliah --}}
                            <div class="card-footer text-center py-3">
                                <div class="small text-muted">Praktikum Pemrograman Web 2</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>