<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef1f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 360px;
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
            margin: 5px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .btn-login {
            background-color: #007bff;
            color: white;
        }
        .btn-register {
            background-color: #28a745;
            color: white;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>LOGIN</h2>

    @if ($errors->has('login_error'))
        <div class="error">{{ $errors->first('login_error') }}</div>
    @endif

    @if (session('success'))
    <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
    @endif


    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
        <input type="password" name="password" placeholder="Password" required>
        <div>
            <button type="submit" class="btn-login">Login</button>
            <button type="button" class="btn-register" onclick="window.location.href='/register'">Registrasi</button>
        </div>
    </form>
</div>

</body>
</html>
