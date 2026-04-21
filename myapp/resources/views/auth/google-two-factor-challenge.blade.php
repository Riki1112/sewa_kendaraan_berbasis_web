<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi OTP</title>
</head>
<body>
    <h2>Verifikasi Login Google</h2>
    <p>Masukkan kode OTP dari Google Authenticator</p>

    @if ($errors->any())
        <div style="color:red;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('google.2fa.verify') }}">
        @csrf
        <input type="text" name="code" placeholder="Masukkan 6 digit kode">
        <button type="submit">Verifikasi</button>
    </form>
</body>
</html>