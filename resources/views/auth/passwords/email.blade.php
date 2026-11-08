<!DOCTYPE html>
{{-- Mengatur bahasa dokumen ke Bahasa Indonesia --}}
<html lang="id">
<head>
    <meta charset="utf-8">
    {{-- Memastikan tampilan responsif di layar ponsel maupun komputer --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Kata Sandi - Data Buku</title>

    {{-- Impor CSS bawaan SB Admin dari folder public/sbadmin/css/styles.css --}}
    <link rel="stylesheet" href="{{ asset('sbadmin/css/styles.css') }}">
</head>

{{-- Latar belakang warna biru khas SB Admin (bg-primary) --}}
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                {{-- Penataan posisi kartu di tengah layar secara vertikal dan horizontal --}}
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        {{-- Kartu utama dengan bayangan (shadow-lg) dan sudut melengkung --}}
                        <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                            
                            {{-- Header Kartu --}}
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Reset Kata Sandi</h3>
                            </div>

                            {{-- Isi Badan Kartu --}}
                            <div class="card-body">
                                {{-- Teks petunjuk singkat untuk memudahkan pengguna --}}
                                <div class="small mb-3 text-muted">
                                    Masukkan alamat email Anda dan kami akan mengirimkan tautan untuk menyetel ulang kata sandi Anda.
                                </div>

                                {{-- Pesan sukses jika email reset password berhasil terkirim --}}
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                {{-- Pesan error jika terdapat kesalahan validasi umum --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        {{ $errors->first() }}
                                    </div>
                                @endif

                                {{-- Form dikirimkan ke rute password.email --}}
                                <form method="POST" action="{{ route('password.email') }}">
                                    {{-- Token CSRF untuk keamanan dari serangan Cross-Site Request Forgery --}}
                                    @csrf

                                    {{-- Input Alamat Email (Floating Label) --}}
                                    <div class="form-floating mb-3">
                                        <input id="email" 
                                               type="email" 
                                               name="email" 
                                               value="{{ old('email') }}"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="nama@email.com" 
                                               required 
                                               autofocus>
                                        <label for="email">Alamat Email</label>
                                    </div>

                                    {{-- Tombol Kirim selebar kartu (d-grid) --}}
                                    <div class="d-grid mt-4 mb-0">
                                        <button type="submit" class="btn btn-primary">
                                            Kirim Tautan Reset Kata Sandi
                                        </button>
                                    </div>
                                </form>
                            </div>

                            {{-- Footer Kartu: Navigasi kembali ke halaman Login & Register --}}
                            <div class="card-footer text-center py-3">
                                <div class="small mb-1">
                                    <a href="{{ route('login') }}" class="text-decoration-none">
                                        Kembali ke halaman Masuk
                                    </a>
                                </div>
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