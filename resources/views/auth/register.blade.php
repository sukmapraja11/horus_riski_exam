@extends('layouts.app')

@section('content')
    <script>
        function validateForm() {
            const email = document.getElementById('email').value;
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const nama = document.getElementById('nama').value;

            if (!nama || !email || !username || !password) {
                alert("Semua field wajib diisi!");
                return false;
            }

            const emailRegex = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
            if (!emailRegex.test(email)) {
                alert("Format email tidak valid!");
                return false;
            }

            if (/\s/.test(username)) {
            alert("Username tidak boleh mengandung spasi!");
            return false;
    }

            return true;
        }
    </script>
<div class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card shadow-sm p-4" style="width: 380px;">
    <h2 class="text-center mb-4">REGISTRASI AKUN</h2>

    <!-- Error message -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST" onsubmit="return validateForm()">
        @csrf
        <div class="mb-3">
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" value="{{ old('nama') }}">
        </div>
        <div class="mb-3">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
        </div>
        <div class="mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-success">Registrasi</button>
        </div>
    </form>

    <p class="text-center mt-3 mb-0">
        Sudah punya akun? <a href="/login">Login di sini</a>
    </p>
</div>
</div>

</div>
</html>
