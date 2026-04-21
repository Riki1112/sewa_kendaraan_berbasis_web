<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi 2FA</title>
</head>
<body>
    <h2>Masukkan Kode Verifikasi</h2>

    @if ($errors->any())
        <div style="color:red;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ url('/two-factor-challenge') }}">
        @csrf
        <label>Kode OTP</label><br>
        <input type="text" name="code" placeholder="Masukkan 6 digit kode">
        <button type="submit">Verifikasi</button>
    </form>

    <br>

    <form method="POST" action="{{ url('/two-factor-challenge') }}">
        @csrf
        <label>Recovery Code</label><br>
        <input type="text" name="recovery_code" placeholder="Masukkan recovery code">
        <button type="submit">Gunakan Recovery Code</button>
    </form>
</body>
</html>