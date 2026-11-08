<!DOCTYPE html>
{{-- Mengatur bahasa dokumen ke bahasa Indonesia --}}
<html lang="id">
<head>
    <meta charset="utf-8">
    {{-- Meta viewport agar tampilan responsif di perangkat mobile maupun layar desktop --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Data Buku</title>

    {{-- Mengimpor stylesheet SB Admin yang sama persis seperti halaman Login --}}
    <link rel="stylesheet" href="{{ asset('sbadmin/css/styles.css') }}">
</head>

{{-- Latar belakang biru penuh (bg-primary) agar konsisten dengan halaman login --}}
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                {{-- Mengetengahkan posisi kartu registrasi --}}
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        {{-- Kartu dengan efek bayangan melayang (shadow-lg) --}}
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            
                            {{-- Header Kartu Registrasi --}}
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Buat Akun</h3>
                            </div>

                            {{-- Isi Formulir Registrasi --}}
                            <div class="card-body">
                                {{-- Formulir dikirimkan ke route 'register' dengan metode POST --}}
                                <form method="POST" action="{{ route('register') }}">
                                    {{-- Token CSRF untuk keamanan dari serangan Cross-Site Request Forgery --}}
                                    @csrf

                                    {{-- Menampilkan alert kesalahan global jika ada input yang tidak valid --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            {{ $errors->first() }}
                                        </div>
                                    @endif

                                    {{-- Field Input: Nama Lengkap --}}
                                    <div class="form-floating mb-3">
                                        <input id="name" 
                                               type="text" 
                                               name="name" 
                                               value="{{ old('name') }}"
                                               class="form-control @error('name') is-invalid @enderror"
                                               placeholder="Nama Lengkap" 
                                               required 
                                               autofocus>
                                        <label for="name">Nama Lengkap</label>
                                    </div>

                                    {{-- Field Input: Alamat Email --}}
                                    <div class="form-floating mb-3">
                                        <input id="email" 
                                               type="email" 
                                               name="email" 
                                               value="{{ old('email') }}"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="nama@email.com" 
                                               required>
                                        <label for="email">Alamat email</label>
                                    </div>

                                    {{-- Field Input: Kata Sandi --}}
                                    <div class="form-floating mb-3">
                                        <input id="password" 
                                               type="password" 
                                               name="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               placeholder="Kata sandi" 
                                               required>
                                        <label for="password">Kata sandi</label>
                                    </div>

                                    {{-- Field Input: Konfirmasi Kata Sandi --}}
                                    <div class="form-floating mb-3">
                                        <input id="password-confirm" 
                                               type="password" 
                                               name="password_confirmation"
                                               class="form-control"
                                               placeholder="Konfirmasi Kata sandi" 
                                               required>
                                        <label for="password-confirm">Konfirmasi Kata sandi</label>
                                    </div>

                                    {{-- Tombol Submit Register selebar kartu --}}
                                    <div class="d-grid mt-4 mb-0">
                                        <button type="submit" class="btn btn-primary">Daftar Akun</button>
                                    </div>
                                </form>
                            </div>

                            {{-- Footer Kartu: Navigasi kembali ke Login --}}
                            <div class="card-footer text-center py-3">
                                <div class="small mb-2">
                                    <a href="{{ route('login') }}" class="text-decoration-none">
                                        Sudah punya akun? Login di sini
                                    </a>
                                </div>
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