<!DOCTYPE html>
{{-- Mengatur bahasa dokumen ke Bahasa Indonesia --}}
<html lang="id">
<head>
    <meta charset="utf-8">
    {{-- Memastikan tampilan responsif di layar HP dan Komputer --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Setel Ulang Kata Sandi - Data Buku</title>

    {{-- Impor CSS bawaan SB Admin --}}
    <link rel="stylesheet" href="{{ asset('sbadmin/css/styles.css') }}">
</head>

{{-- Latar belakang warna biru khas SB Admin (bg-primary) --}}
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                {{-- Penataan posisi kartu di tengah layar --}}
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        {{-- Kartu utama dengan bayangan (shadow-lg) dan sudut melengkung --}}
                        <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                            
                            {{-- Header Kartu --}}
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Setel Ulang Kata Sandi</h3>
                            </div>

                            {{-- Isi Badan Kartu --}}
                            <div class="card-body">
                                {{-- Pesan error jika ada kendala validasi input --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        {{ $errors->first() }}
                                    </div>
                                @endif

                                {{-- Form dikirimkan ke rute password.update untuk memperbarui password --}}
                                <form method="POST" action="{{ route('password.update') }}">
                                    {{-- Token CSRF demi keamanan request POST --}}
                                    @csrf

                                    {{-- Hidden token rahasia yang dikirim oleh sistem dari email --}}
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    {{-- Input Alamat Email (Floating Label) --}}
                                    <div class="form-floating mb-3">
                                        <input id="email" 
                                               type="email" 
                                               name="email" 
                                               value="{{ $email ?? old('email') }}"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="nama@email.com" 
                                               required 
                                               autofocus>
                                        <label for="email">Alamat Email</label>
                                    </div>

                                    {{-- Input Kata Sandi Baru (Floating Label) --}}
                                    <div class="form-floating mb-3">
                                        <input id="password" 
                                               type="password" 
                                               name="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               placeholder="Kata Sandi Baru" 
                                               required>
                                        <label for="password">Kata Sandi Baru</label>
                                    </div>

                                    {{-- Input Konfirmasi Kata Sandi Baru (Floating Label) --}}
                                    <div class="form-floating mb-3">
                                        <input id="password-confirm" 
                                               type="password" 
                                               name="password_confirmation"
                                               class="form-control"
                                               placeholder="Konfirmasi Kata Sandi Baru" 
                                               required>
                                        <label for="password-confirm">Konfirmasi Kata Sandi Baru</label>
                                    </div>

                                    {{-- Tombol Submit selebar kartu (d-grid) --}}
                                    <div class="d-grid mt-4 mb-0">
                                        <button type="submit" class="btn btn-primary">
                                            Simpan Kata Sandi Baru
                                        </button>
                                    </div>
                                </form>
                            </div>

                            {{-- Footer Kartu: Navigasi dan Identitas Matakuliah --}}
                            <div class="card-footer text-center py-3">
                                <div class="small mb-1">
                                    <a href="{{ route('login') }}" class="text-decoration-none">
                                        Ingat kata sandi? Masuk di sini
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