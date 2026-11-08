<!DOCTYPE html>
{{-- Mengatur atribut bahasa dokumen ke Bahasa Indonesia --}}
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    {{-- Memastikan tampilan responsif di layar ponsel maupun desktop --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title', 'Data Buku') - Praktikum Pemrograman Web 2</title>

    {{-- Impor CSS templat SB Admin --}}
    <link href="{{ asset('sbadmin/css/styles.css') }}" rel="stylesheet" />
    {{-- Impor FontAwesome untuk ikon profesional --}}
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    {{-- Top Navbar: Menggunakan bg-primary agar bagian atas berwarna biru profesional --}}
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary shadow-sm">
        {{-- Brand / Logo Aplikasi --}}
        <a class="navbar-brand ps-3 fw-bold fs-5" href="{{ route('buku.index') }}">
            <i class="fas fa-book-open me-2"></i>Data Buku
        </a>
        
        {{-- Tombol Toggle Sidebar (Menu Burger) --}}
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-white" id="sidebarToggle" href="#!">
            <i class="fas fa-bars fs-6"></i>
        </button>

        {{-- Spacing fleksibel kanan --}}
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>
        
        {{-- Menu Profil Pengguna di pojok kanan atas --}}
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white fw-semibold" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle me-1 fs-5 align-middle"></i> {{ Auth::user()->name ?? 'Zalfa Ajeng Suardafa' }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="navbarDropdown">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt me-2"></i>Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        {{-- Sidebar Kiri --}}
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark bg-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav pt-3">
                        <div class="sb-sidenav-menu-heading text-uppercase text-muted px-3 small fw-bold">Menu Utama</div>
                        
                        {{-- Menu Dashboard --}}
                        <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-primary"></i></div>
                            Dashboard
                        </a>

                        {{-- Menu Data Buku --}}
                        <a class="nav-link {{ request()->is('buku*') ? 'active' : '' }}" href="{{ route('buku.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-book text-primary"></i></div>
                            Data Buku
                        </a>
                    </div>
                </div>
                
                {{-- User Info di bagian bawah sidebar --}}
                <div class="sb-sidenav-footer bg-secondary bg-opacity-25 text-white-50">
                    <div class="small">Masuk sebagai:</div>
                    <div class="fw-bold text-white">{{ Auth::user()->name ?? 'Zalfa Ajeng Suardafa' }}</div>
                </div>
            </nav>
        </div>

        {{-- Konten Utama Halaman --}}
        <div id="layoutSidenav_content" class="bg-light">
            <main class="p-4">
                @yield('content')
            </main>

            {{-- Footer Bawah --}}
            <footer class="py-3 bg-white border-top mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small text-muted">
                        <div>Praktikum Pemrograman Web 2 - Zalfa Ajeng Suardafa</div>
                        <div>Versi 1.0</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    {{-- Script JS bawaan Bootstrap & SB Admin --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('sbadmin/js/scripts.js') }}"></script>
</body>
</html>