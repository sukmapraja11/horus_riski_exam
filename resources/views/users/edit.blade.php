@extends('layouts.app')

@section('content')

<div class="container mt-5 col-md-6">
    <div class="card shadow">
        <div class="card-header text-center bg-primary text-white">
            <h4>UPDATE USER</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="POST" onsubmit="return validateUpdateForm()">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $user->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function validateUpdateForm() {
    const nama = document.getElementById('nama').value.trim();
    const email = document.getElementById('email').value.trim();
    const username = document.getElementById('username').value.trim();

    // Cek field wajib diisi
    if (!nama || !email || !username) {
        alert("Semua field wajib diisi!");
        return false;
    }

    // Cek format email
    const emailRegex = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
    if (!emailRegex.test(email)) {
        alert("Format email tidak valid!");
        return false;
    }

    // Cek username tidak boleh ada spasi
    if (/\s/.test(username)) {
        alert("Username tidak boleh mengandung spasi!");
        return false;
    }

    return true; // form valid
}
</script>


</html>
