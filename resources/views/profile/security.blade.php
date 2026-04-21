@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Security / Two Factor Authentication</h2>

    @if (session('status') == 'two-factor-authentication-enabled')
        <p style="color: green;">2FA aktif. Silakan scan QR dan konfirmasi kode.</p>
    @endif

    @if (session('status') == 'two-factor-authentication-confirmed')
        <p style="color: green;">2FA berhasil dikonfirmasi.</p>
    @endif

    @if (! auth()->user()->two_factor_secret)
        <form method="POST" action="{{ url('/user/two-factor-authentication') }}">
            @csrf
            <button type="submit">Aktifkan 2FA</button>
        </form>
    @else
        <p>Scan QR Code ini di Google Authenticator:</p>
        <div>
            {!! auth()->user()->twoFactorQrCodeSvg() !!}
        </div>

        <form method="POST" action="{{ url('/user/confirmed-two-factor-authentication') }}">
            @csrf
            <input type="text" name="code" placeholder="Masukkan kode OTP">
            <button type="submit">Konfirmasi 2FA</button>
        </form>

        <h4>Recovery Codes:</h4>
        <ul>
            @foreach (auth()->user()->recoveryCodes() as $code)
                <li>{{ $code }}</li>
            @endforeach
        </ul>

        <form method="POST" action="{{ url('/user/two-factor-recovery-codes') }}">
            @csrf
            <button type="submit">Generate Ulang Recovery Codes</button>
        </form>

        <form method="POST" action="{{ url('/user/two-factor-authentication') }}">
            @csrf
            @method('DELETE')
            <button type="submit">Nonaktifkan 2FA</button>
        </form>
    @endif
</div>
@endsection