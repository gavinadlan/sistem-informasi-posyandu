<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="{{ asset('images/logo_posyandu.png') }}" alt="Logo Posyandu">
            <h2>Posyandu Desa Kadugenep</h2>
        </div>
        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('login.process') }}">
            @csrf
            <select name="role" required>
                <option value="" disabled selected>Pilih peran Anda</option>
                <option value="admin">Admin</option>
                <option value="ibu_balita">Ibu Balita</option>
            </select>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
