<!DOCTYPE html>
{{-- Mengatur atribut bahasa dokumen ke Bahasa Indonesia --}}
<html lang="id">
<head>
    <meta charset="utf-8">
    {{-- Meta viewport agar tampilan responsif di ponsel maupun desktop --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Email - Data Buku</title>

    {{-- Mengimpor CSS bawaan templat SB Admin dari public/sbadmin/css/styles.css --}}
    <link rel="stylesheet" href="{{ asset('sbadmin/css/styles.css') }}">
</head>

{{-- Latar belakang warna biru khas SB Admin (bg-primary) --}}
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                {{-- Memposisikan kartu formulir di tengah layar --}}
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        {{-- Kartu utama dengan efek bayangan (shadow-lg) dan sudut membulat --}}
                        <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                            
                            {{-- Header Kartu Verifikasi Email --}}
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Verifikasi Alamat Email</h3>
                            </div>

                            {{-- Isi Badan Kartu --}}
                            <div class="card-body text-center">
                                {{-- Notifikasi pemberitahuan jika email verifikasi baru berhasil dikirim ulang --}}
                                @if (session('resent'))
                                    <div class="alert alert-success alert-dismissible fade show text-start" role="alert">
                                        Tautan verifikasi baru telah dikirimkan ke alamat email Anda.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                {{-- Pesan instruksi verifikasi email --}}
                                <p class="text-muted mb-4">
                                    Sebelum melanjutkan, silakan periksa email Anda untuk menemukan tautan konfirmasi verifikasi akun.
                                </p>

                                <hr class="my-4">

                                {{-- Informasi dan form pemicu pengiriman ulang email verifikasi --}}
                                <p class="mb-2 text-muted small">Jika Anda tidak menerima email tersebut:</p>
                                
                                {{-- Form POST mengarah ke rute verification.resend bawaan Laravel/UI --}}
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    {{-- Token CSRF wajib untuk keamanan dari serangan Cross-Site Request Forgery --}}
                                    @csrf
                                    
                                    {{-- Tombol untuk meminta tautan verifikasi ulang --}}
                                    <button type="submit" class="btn btn-outline-primary px-4 py-2">
                                        Kirim Ulang Email Verifikasi
                                    </button>
                                </form>
                            </div>

                            {{-- Footer Kartu: Navigasi Logout & Identitas Matakuliah --}}
                            <div class="card-footer text-center py-3">
                                <div class="small mb-2">
                                    {{-- Form logout jika pengguna ingin keluar atau salah memasukkan email saat mendaftar --}}
                                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-link small text-decoration-none p-0 m-0 align-baseline">
                                            Keluar / Ganti Akun
                                        </button>
                                    </form>
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