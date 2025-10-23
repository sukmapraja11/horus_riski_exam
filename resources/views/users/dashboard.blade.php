@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <!-- Judul Dashboard -->
    <h2 class="mb-4 text-center">DASHBOARD PENGGUNA</h2>

    <!-- Pesan Success/Error -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tombol Logout -->
    <form action="{{ route('logout') }}" method="POST" class="text-end mb-3">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
    </form>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('dashboard') }}" class="d-flex mb-4">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari Pengguna..." value="{{ $search }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <!-- Tabel Pengguna -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada data pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination (opsional) -->
    <div class="d-flex justify-content-center mt-3">
        {{ $users->links() }}
    </div>
</div>

@endsection
