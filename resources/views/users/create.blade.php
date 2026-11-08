@extends('layouts.master')
@section('title', 'Tambah User')

@section('content')
<h1 class="mt-2">Tambah Data User</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Data User</a></li>
    <li class="breadcrumb-item active">Tambah User</li>
</ol>

<div class="card mb-4">
    <div class="card-header"><i class="fas fa-plus me-1"></i> Form Tambah User</div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('users.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select id="level" name="level" class="form-select">
                    <option value="">-- Pilih Level --</option>
                    <option value="user" {{ old('level') == 'user' ? 'selected' : '' }}>user</option>
                    <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan User</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection