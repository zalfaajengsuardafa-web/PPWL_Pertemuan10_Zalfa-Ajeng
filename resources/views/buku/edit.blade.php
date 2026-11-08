{{-- Menginduk ke tata letak master aplikasi (layouts/master.blade.php) --}}
@extends('layouts.master')

{{-- Mengatur judul halaman pada tab browser --}}
@section('title', 'Edit Buku')

@section('content')
<div class="container-fluid px-0">

    {{-- Judul Halaman Utama & Breadcrumb Navigasi --}}
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h2 class="fw-bold text-dark m-0">Edit Data Buku</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent p-0 small">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}" class="text-decoration-none text-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('buku.index') }}" class="text-decoration-none text-primary">Data Buku</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Buku</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Kartu Utama Formulir Edit Buku --}}
    <div class="card border-0 shadow-sm rounded-3 mb-4">
        
        {{-- Header Kartu dengan Aksen Warna Biru --}}
        <div class="card-header bg-white py-3 border-bottom d-flex align-items-center">
            <div class="bg-primary bg-opacity-10 text-primary p-2 rounded me-2">
                <i class="fas fa-edit fs-5"></i>
            </div>
            <h5 class="m-0 fw-bold text-dark">Formulir Edit Buku</h5>
        </div>

        {{-- Badan Kartu & Isian Formulir --}}
        <div class="card-body p-4">

            {{-- Menampilkan Alert Notifikasi Jika Ada Kesalahan Validasi Input --}}
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-exclamation-triangle me-2 fs-5"></i>
                        <strong>Terdapat kesalahan pada inputan Anda:</strong>
                    </div>
                    <ul class="mb-0 ps-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

            {{-- Formulir dikirimkan ke rute buku.update dengan parameter ID buku --}}
            <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                {{-- Token CSRF wajib untuk mengamankan request POST dari serangan Cross-Site Request Forgery --}}
                @csrf
                
                {{-- Method Spoofing PUT wajib di Laravel untuk proses pembaruan data (Update) --}}
                @method('PUT')
                
                {{-- Input 1: Judul Buku (Menggunakan Floating Label) --}}
                <div class="form-floating mb-3">
                    <input type="text" 
                           class="form-control @error('judul') is-invalid @enderror" 
                           id="judul" 
                           name="judul" 
                           placeholder="Judul Buku"
                           value="{{ old('judul', $buku->judul) }}" 
                           required>
                    <label for="judul"><i class="fas fa-book me-1 text-muted"></i> Judul Buku</label>
                </div>

                {{-- Input 2: Nama Penulis (Menggunakan Floating Label) --}}
                <div class="form-floating mb-3">
                    <input type="text" 
                           class="form-control @error('penulis') is-invalid @enderror" 
                           id="penulis" 
                           name="penulis" 
                           placeholder="Penulis"
                           value="{{ old('penulis', $buku->penulis) }}" 
                           required>
                    <label for="penulis"><i class="fas fa-user-edit me-1 text-muted"></i> Penulis</label>
                </div>

                {{-- Input 3: Harga Buku (Menggunakan Floating Label) --}}
                <div class="form-floating mb-3">
                    <input type="number" 
                           class="form-control @error('harga') is-invalid @enderror" 
                           id="harga" 
                           name="harga" 
                           placeholder="Harga (Rp)"
                           value="{{ old('harga', $buku->harga) }}" 
                           required>
                    <label for="harga"><i class="fas fa-tag me-1 text-muted"></i> Harga (Rp)</label>
                </div>

                {{-- Input 4: Tanggal Terbit Buku (Menggunakan Floating Label) --}}
                <div class="form-floating mb-4">
                    <input type="text" 
                           class="form-control date @error('tgl_terbit') is-invalid @enderror" 
                           id="tgl_terbit" 
                           name="tgl_terbit" 
                           placeholder="Tanggal Terbit"
                           value="{{ old('tgl_terbit', is_string($buku->tgl_terbit) ? $buku->tgl_terbit : $buku->tgl_terbit->format('Y/m/d')) }}" 
                           required>
                    <label for="tgl_terbit"><i class="fas fa-calendar-alt me-1 text-muted"></i> Tanggal Terbit (YYYY/MM/DD)</label>
                </div>

                {{-- Tombol Aksi (Submit & Batal) --}}
                <div class="d-flex gap-2">
                    {{-- Tombol Simpan Perubahan (Warna Biru Utama) --}}
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">
                        <i class="fas fa-save me-1"></i> Update Buku
                    </button>
                    
                    {{-- Tombol Batal Kembali ke Halaman Daftar Buku --}}
                    <a href="{{ route('buku.index') }}" class="btn btn-secondary px-4 shadow-sm">
                        <i class="fas fa-arrow-left me-1"></i> Batal
                    </a>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection