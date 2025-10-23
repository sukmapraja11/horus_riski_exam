@extends('layouts.app')

@section('content')
<div class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow-sm" style="width: 360px;">
    <h2 class="text-center mb-4">LOGIN</h2>

    <!-- Error message -->
    @if ($errors->has('login_error'))
        <div class="alert alert-danger">{{ $errors->first('login_error') }}</div>
    @endif

    <!-- Success message -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('login.post') }}" method="POST" onsubmit="return validateLoginForm()">
        @csrf
        <div class="mb-3">
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="d-flex justify-content-center gap-2">
            <button type="submit" class="btn btn-primary">Login</button>
            <button type="button" class="btn btn-success" onclick="window.location.href='{{ route('register') }}'">Registrasi</button>
        </div>
    </form>
</div>

<script>
function validateLoginForm() {
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();

    // Cek field wajib diisi
    if (!username || !password) {
        alert("Semua field wajib diisi!");
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
</div>
</div>
</html>
