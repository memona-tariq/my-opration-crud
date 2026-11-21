
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eaf2f8;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-box {
            background: white;
            width: 340px;
            max-width: calc(100% - 60px);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px #0002;
        }
        h2 { color: #174a70; text-align: center; }
        label { display: block; margin-top: 18px; }
        input {
            width: 100%;
            box-sizing: border-box;
            padding: 11px;
            margin-top: 7px;
            border: 1px solid #ccd5df;
            border-radius: 6px;
        }
        button {
            width: 100%;
            padding: 12px;
            margin-top: 22px;
            border: 0;
            border-radius: 6px;
            color: white;
            background: #174a70;
            cursor: pointer;
        }
        .error { color: red; font-size: 13px; }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Welcome Back</h2>

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <label>Email Address</label>
        <input type="email" name="email"
               value="{{ old('email') }}" required>
        @error('email') <p class="error">{{ $message }}</p> @enderror

        <label>Password</label>
        <input type="password" name="password" required>
        @error('password') <p class="error">{{ $message }}</p> @enderror

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account?
        <a href="{{ route('signup') }}">Sign Up</a>
    </p>
</div>
</body>
</html>
