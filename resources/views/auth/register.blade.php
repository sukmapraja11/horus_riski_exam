<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef1f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 380px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        .success {
            color: green;
            margin-bottom: 10px;
        }
    </style>
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

            return true;
        }
    </script>
</head>
<body>

<div class="register-container">
    <h2>REGISTRASI AKUN</h2>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $err)
                <div>{{ $err }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST" onsubmit="return validateForm()">
        @csrf
        <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" value="{{ old('nama') }}">
        <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
        <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
        <input type="password" name="password" id="password" placeholder="Password">
        <button type="submit">Registrasi</button>
    </form>

    <p style="margin-top: 10px;">
        Sudah punya akun? <a href="/login">Login di sini</a>
    </p>
</div>

</body>
</html>
