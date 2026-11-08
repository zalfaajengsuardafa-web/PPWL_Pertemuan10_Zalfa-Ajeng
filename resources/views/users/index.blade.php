@extends('layouts.master')
@section('title', 'Data User')

@section('content')
<h1 class="mt-2">Data User</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data User</li>
</ol>

@if (Session::has('pesan'))
    <div class="alert alert-success">{{ Session::get('pesan') }}</div>
@endif

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-users me-1"></i> Daftar User</span>
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Tambah User</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr><th>No</th><th>Nama</th><th>Email</th><th>Level</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @forelse ($data_user as $user)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge {{ $user->level == 'admin' ? 'bg-danger' : 'bg-secondary' }}">
                                {{ $user->level }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="btn btn-warning btn-sm">Edit</a>
                                @if ((int) $user->id !== (int) Auth::id())
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin mau di hapus?')"
                                            type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">Belum ada data user.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <strong>Jumlah User: {{ $jumlah_user }}</strong>
            <div>{{ $data_user->links() }}</div>
        </div>
    </div>
</div>
@endsection