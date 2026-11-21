
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

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
            background: #e8f3f1;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 90%;
            max-width: 420px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px #00000015;
        }

        h2 {
            text-align: center;
            color: #176b63;
        }

        p {
            color: #555;
            line-height: 1.5;
        }

        label {
            display: block;
            margin: 18px 0 8px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #bbb;
            border-radius: 6px;
        }

        button {
            width: 100%;
            margin-top: 18px;
            padding: 12px;
            background: #176b63;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .message {
            color: green;
        }

        .error {
            color: red;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password?</h2>

        <p>Enter your registered email address to receive a password reset link.</p>

        @if (session('status'))
            <p class="message">{{ session('status') }}</p>
        @endif

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter your registered email"
                required
            >

            <button type="submit">Send Reset Link</button>
        </form>

        <a class="back" href="{{ route('registration.login') }}">
            Back to Login
        </a>
    </div>
</body>
</html>
