<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Vehicle Rental</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background:
                linear-gradient(135deg, rgba(13, 110, 253, 0.95), rgba(26, 35, 126, 0.95)),
                url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;
        }

        .login-card {
            width: 100%;
            max-width: 460px;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.18);
            padding: 40px 32px;
        }

        .brand-title {
            font-size: 32px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 8px;
            text-align: center;
        }

        .brand-subtitle {
            text-align: center;
            color: #6b7280;
            font-size: 15px;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-control {
            height: 50px;
            border-radius: 12px;
            border: 1px solid #d1d5db;
            padding: 0 16px;
            font-size: 15px;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.15);
        }

        .btn-login {
            height: 50px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            background: linear-gradient(90deg, #2563eb, #1d4ed8);
            border: none;
            transition: 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.25);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: #9ca3af;
            font-size: 14px;
            margin: 24px 0;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #e5e7eb;
        }

        .divider:not(:empty)::before {
            margin-right: 12px;
        }

        .divider:not(:empty)::after {
            margin-left: 12px;
        }

        .btn-google {
            height: 52px;
            border-radius: 12px;
            background: #fff;
            border: 1px solid #d1d5db;
            color: #111827;
            font-weight: 600;
            font-size: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-google:hover {
            background: #f9fafb;
            border-color: #9ca3af;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transform: translateY(-1px);
            color: #111827;
        }

        .google-icon {
            width: 20px;
            height: 20px;
        }

        .bottom-text {
            text-align: center;
            margin-top: 24px;
            font-size: 15px;
            color: #6b7280;
        }

        .bottom-text a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        .bottom-text a:hover {
            text-decoration: underline;
        }

        .alert {
            border-radius: 12px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <h1 class="brand-title">Welcome Back</h1>
            <p class="brand-subtitle">Login to your Vehicle Rental account</p>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="/login" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control" 
                        placeholder="Enter your email"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        class="form-control" 
                        placeholder="Enter your password"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary btn-login w-100">
                    Login
                </button>
            </form>

            <div class="divider">or continue with</div>

            <a href="{{ url('/auth/google/redirect') }}" class="btn-google w-100">
                <svg class="google-icon" viewBox="0 0 48 48">
                    <path fill="#FFC107" d="M43.6 20.5H42V20H24v8h11.3C33.6 32.7 29.2 36 24 36c-6.6 0-12-5.4-12-12s5.4-12 12-12c3 0 5.7 1.1 7.8 3l5.7-5.7C34.1 6.1 29.3 4 24 4 12.9 4 4 12.9 4 24s8.9 20 20 20 20-8.9 20-20c0-1.3-.1-2.4-.4-3.5z"/>
                    <path fill="#FF3D00" d="M6.3 14.7l6.6 4.8C14.7 15 19 12 24 12c3 0 5.7 1.1 7.8 3l5.7-5.7C34.1 6.1 29.3 4 24 4c-7.7 0-14.3 4.3-17.7 10.7z"/>
                    <path fill="#4CAF50" d="M24 44c5.1 0 9.8-2 13.3-5.2l-6.1-5c-2 1.5-4.5 2.2-7.2 2.2-5.2 0-9.6-3.3-11.2-8l-6.5 5C9.6 39.5 16.2 44 24 44z"/>
                    <path fill="#1976D2" d="M43.6 20.5H42V20H24v8h11.3c-1.1 3.1-3.3 5.4-6.1 6.8l6.1 5C39.9 36.2 44 30.7 44 24c0-1.3-.1-2.4-.4-3.5z"/>
                </svg>
                Sign in with Google
            </a>

            <div class="bottom-text">
                Don’t have an account? <a href="/register">Register</a>
            </div>
        </div>
    </div>
</body>
</html>