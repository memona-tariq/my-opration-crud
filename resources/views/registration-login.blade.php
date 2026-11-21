
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #edf2ff, #e8ddff);
            color: #172554;
        }

        .login-card {
            width: 100%;
            max-width: 440px;
            padding: 38px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 18px 55px rgba(35, 53, 110, 0.16);
        }

        .icon {
            width: 68px;
            height: 68px;
            display: grid;
            place-items: center;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #e9efff;
            font-size: 32px;
        }

        h1 {
            margin: 0 0 10px;
            text-align: center;
            font-size: 28px;
        }

        .subtitle {
            margin: 0 0 28px;
            color: #64748b;
            text-align: center;
            font-size: 14px;
            line-height: 1.6;
        }

        label {
            display: block;
            margin: 17px 0 8px;
            font-size: 13px;
            font-weight: 700;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #d4def7;
            border-radius: 9px;
            background: #fbfcff;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #6578f5;
            box-shadow: 0 0 0 3px #6578f51c;
        }

        .login-button {
            width: 100%;
            margin-top: 25px;
            padding: 14px;
            border: none;
            border-radius: 9px;
            background: linear-gradient(100deg, #377dff, #8052ed);
            color: white;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
        }

        .login-button:hover {
            opacity: 0.9;
        }

        .message {
            margin: 10px 0;
            color: #dc2626;
            font-size: 13px;
        }

        .footer {
            margin-top: 22px;
            text-align: center;
            font-size: 14px;
            color: #64748b;
        }

        .footer a {
            color: #4d63e8;
            font-weight: 700;
            text-decoration: none;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 28px 22px;
            }
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="icon">🎓</div>

        <h1>Welcome Back!</h1>
        <p class="subtitle">
            Login to your Student Registration account.
        </p>

        @if (session('error'))
            <p class="message">{{ session('error') }}</p>
        @endif

        @if ($errors->any())
            <div class="message">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter your registered email"
                autocomplete="email"
                required
            >

            
<label for="password">Password</label>
<input
    type="password"
    id="password"
    name="password"
    placeholder="Enter your password"
    autocomplete="current-password"
    required
>

<!-- Forgot Password link -->
<div style="text-align: right; margin: 10px 0;">
    <a href="{{ route('password.request') }}">
        Forgot Password?
    </a>
</div>

<button type="submit" class="login-button">
    Login to Account
</button>
</form>

<div class="footer">
    Don't have an account?
    <a href="{{ route('signup') }}">Create Account</a>
</div>
</div>
</body>
</html>
