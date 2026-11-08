{{-- Menginduk ke berkas tata letak utama aplikasi --}}
@extends('layouts.master')

{{-- Menetapkan judul halaman --}}
@section('title', auth()->check() && (auth()->user()->email === 'ajengzalfa21@gmail.com' || (isset(auth()->user()->role) && auth()->user()->role === 'admin')) ? 'Data Buku (Admin)' : 'Katalog Buku')

@section('content')
<div class="container-fluid px-0">

    {{-- ----------------------------------------------------------------- --}}
    {{-- TAMPILAN KHUSUS ADMIN (Tabel CRUD Management)                   --}}
    {{-- Terbuka otomatis jika login sebagai ajengzalfa21@gmail.com        --}}
    {{-- ----------------------------------------------------------------- --}}
    @if (auth()->check() && (auth()->user()->email === 'ajengzalfa21@gmail.com' || (isset(auth()->user()->role) && auth()->user()->role === 'admin')))

        {{-- Header Halaman & Navigasi Breadcrumb --}}
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h2 class="fw-bold text-dark m-0">Data Buku</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 bg-transparent p-0 small">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-decoration-none text-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Buku</li>
                    </ol>
                </nav>
            </div>
        </div>

        {{-- Notifikasi Sukses dari Controller saat Tambah/Edit/Hapus Data --}}
        @if (Session::has('pesan'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-3" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ Session::get('pesan') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        {{-- Kartu Utama Pembungkus Tabel Data Buku --}}
        <div class="card border-0 shadow-sm rounded-3">
            
            {{-- Header Kartu: Judul Tabel & Tombol Tambah Data --}}
            <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center gap-2 border-bottom">
                <div class="d-flex align-items-center me-auto">
                    <div class="bg-primary bg-opacity-10 text-primary p-2 rounded me-2">
                        <i class="fas fa-table fs-5"></i>
                    </div>
                    <h5 class="m-0 fw-bold text-dark">Daftar Buku</h5>
                </div>

                {{-- Tombol Tambah Buku --}}
                <a href="{{ route('buku.create') }}" class="btn btn-primary btn-sm px-3 shadow-sm rounded-2">
                    <i class="fas fa-plus me-1"></i> Tambah Buku
                </a>
            </div>

            {{-- Badan Kartu & Kontainer Tabel Responsif --}}
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        
                        {{-- Header Tabel --}}
                        <thead class="bg-primary text-white text-uppercase small" style="letter-spacing: 0.5px;">
                            <tr>
                                <th class="py-3 ps-3 text-center" style="width: 50px;">No</th>
                                <th class="py-3">Judul Buku</th>
                                <th class="py-3">Penulis</th>
                                <th class="py-3">Harga</th>
                                <th class="py-3 text-center">Tgl. Terbit</th>
                                <th class="py-3 text-center" style="width: 160px;">Aksi</th>
                            </tr>
                        </thead>

                        {{-- Badan Tabel: Menampilkan Baris Data Buku --}}
                        <tbody>
                            @forelse ($data_buku as $buku)
                                <tr>
                                    <td class="text-center fw-semibold text-muted ps-3">{{ ++$no }}</td>
                                    <td class="fw-bold text-dark">{{ $buku->judul }}</td>
                                    <td>
                                        <span class="badge bg-light text-dark border fw-normal px-2 py-1">
                                            {{ $buku->penulis }}
                                        </span>
                                    </td>
                                    <td class="fw-semibold text-success text-nowrap">
                                        Rp {{ number_format($buku->harga, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center text-secondary small text-nowrap">
                                        {{ $buku->tgl_terbit->format('d/m/Y') }}
                                    </td>
                                    <td class="text-center pe-3">
                                        <div class="d-flex justify-content-center gap-1" role="group">
                                            
                                            {{-- Tombol Edit --}}
                                            <a href="{{ route('buku.edit', $buku->id) }}" 
                                               class="btn btn-warning btn-sm text-dark px-2 shadow-sm"
                                               title="Edit">
                                                <i class="fas fa-edit me-1"></i> Edit
                                            </a>

                                            {{-- Form Hapus Data Buku --}}
                                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm px-2 shadow-sm"
                                                        onclick="return confirm('Yakin mau dihapus?')"
                                                        title="Hapus">
                                                    <i class="fas fa-trash me-1"></i> Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <i class="fas fa-inbox fs-3 d-block mb-2 text-secondary"></i>
                                        Belum ada data buku yang tersimpan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>

            {{-- Footer Kartu: Informasi Jumlah Buku & Pagination --}}
            <div class="card-footer bg-white border-top py-3 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                <div class="small text-muted">
                    <strong>Jumlah Buku:</strong> 
                    <span class="badge bg-primary rounded-pill px-3 py-2 ms-1">
                        {{ $jumlah_buku }}
                    </span>
                </div>

                <div>
                    {{ $data_buku->links() }}
                </div>
            </div>

        </div>

    {{-- ----------------------------------------------------------------- --}}
    {{-- TAMPILAN KHUSUS USER / PEMBACA (Katalog Kartu Grid)              --}}
    {{-- Terbuka otomatis untuk akun pengguna lain                        --}}
    {{-- ----------------------------------------------------------------- --}}
    @else

        <div class="row mb-4 align-items-center">
            <div class="col-md-6">
                <h3 class="fw-bold text-dark mb-1">Katalog Buku</h3>
                <p class="text-muted mb-0">Temukan dan jelajahi koleksi buku terbaru di sini</p>
            </div>
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <span class="badge bg-primary px-3 py-2 rounded-pill">
                    Total Koleksi: {{ $jumlah_buku }} Buku
                </span>
            </div>
        </div>

        {{-- Grid Kartu Buku untuk User --}}
        <div class="row g-4">
            @forelse ($data_buku as $buku)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100 rounded-3 overflow-hidden">
                        
                        {{-- Icon Placeholder Cover Buku --}}
                        <div class="bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center py-4">
                            <i class="fas fa-book-open display-4"></i>
                        </div>

                        <div class="card-body d-flex flex-column p-3">
                            <div class="mb-2">
                                <span class="badge bg-light text-dark border fw-normal px-2 py-1">
                                    <i class="fas fa-user-edit me-1 text-muted"></i>{{ $buku->penulis }}
                                </span>
                            </div>

                            <h5 class="card-title fw-bold text-dark fs-6 text-truncate mb-2" title="{{ $buku->judul }}">
                                {{ $buku->judul }}
                            </h5>

                            <p class="card-text fw-bold text-success m-0 mb-3 fs-6">
                                Rp {{ number_format($buku->harga, 0, ',', '.') }}
                            </p>

                            <div class="mt-auto d-grid gap-2">
                                <button class="btn btn-outline-primary btn-sm rounded-2">
                                    <i class="fas fa-eye me-1"></i> Lihat Detail
                                </button>
                                <button class="btn btn-primary btn-sm rounded-2">
                                    <i class="fas fa-shopping-cart me-1"></i> Pinjam / Beli
                                </button>
                            </div>
                        </div>

                        <div class="card-footer bg-light border-0 py-2 text-center text-muted small">
                            Terbit: {{ $buku->tgl_terbit->format('d/m/Y') }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 bg-white rounded-3 shadow-sm">
                    <i class="fas fa-book-dead display-1 text-muted mb-3"></i>
                    <p class="text-muted fw-bold">Belum ada buku yang tersedia untuk ditayangkan.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination User --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $data_buku->links() }}
        </div>

    @endif

</div>
@endsection