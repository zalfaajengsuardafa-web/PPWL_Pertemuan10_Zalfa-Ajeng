<!DOCTYPE html>
{{-- Mengatur atribut bahasa HTML ke bahasa Indonesia --}}
<html lang="id">
<head>
    <meta charset="utf-8">
    {{-- Meta viewport wajib ada agar tampilan responsif di layar HP maupun laptop --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Data Buku</title>

    {{-- Mengimpor stylesheet SB Admin dari folder public/sbadmin/css/styles.css --}}
    <link rel="stylesheet" href="{{ asset('sbadmin/css/styles.css') }}">
</head>

{{-- Beri latar belakang warna biru (bg-primary) sesuai tema SB Admin pada gambar --}}
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                {{-- Membuat posisi card di tengah secara vertikal dan horizontal --}}
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        {{-- Card utama dengan efek bayangan (shadow-lg) dan sudut melengkung --}}
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            
                            {{-- Header Kartu Login --}}
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Login</h3>
                            </div>

                            {{-- Isi Badan Kartu --}}
                            <div class="card-body">
                                {{-- Form autentikasi login yang mengarah ke route('login') --}}
                                <form method="POST" action="{{ route('login') }}">
                                    {{-- @csrf wajib untuk mengamankan form POST dari serangan Cross-Site Request Forgery --}}
                                    @csrf

                                    {{-- Menampilkan Alert merah jika terdapat kesalahan validasi/kredensial login --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            {{ $errors->first() }}
                                        </div>
                                    @endif

                                    {{-- Input Alamat Email --}}
                                    <div class="form-floating mb-3">
                                        <input id="email" 
                                               type="email" 
                                               name="email" 
                                               value="{{ old('email') }}"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="nama@email.com" 
                                               required 
                                               autofocus>
                                        <label for="email">Alamat email</label>
                                    </div>

                                    {{-- Input Kata Sandi --}}
                                    <div class="form-floating mb-3">
                                        <input id="password" 
                                               type="password" 
                                               name="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               placeholder="Kata sandi" 
                                               required>
                                        <label for="password">Kata sandi</label>
                                    </div>

                                    {{-- Link Lupa Password (Tampil jika fitur reset password aktif di Laravel) --}}
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        @if (Route::has('password.request'))
                                            <a class="small text-decoration-none" href="{{ route('password.request') }}">
                                                Lupa kata sandi?
                                            </a>
                                        @else
                                            <div></div>
                                        @endif
                                        
                                        {{-- Tombol Masuk --}}
                                        <button type="submit" class="btn btn-primary px-4">Masuk</button>
                                    </div>
                                </form>
                            </div>

                            {{-- Footer Kartu: Tempat menaruh link Register dan Identitas Matakuliah --}}
                            <div class="card-footer text-center py-3">
                                {{-- Link untuk menuju ke halaman Pendaftaran / Register --}}
                                @if (Route::has('register'))
                                    <div class="small mb-2">
                                        <a href="{{ route('register') }}" class="text-decoration-none">
                                            Belum punya akun? Daftar sekarang!
                                        </a>
                                    </div>
                                @endif
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