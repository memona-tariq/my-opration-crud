
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Successful</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eaf7ee;
            text-align: center;
            padding: 70px 20px;
        }

        .box {
            background: white;
            max-width: 450px;
            margin: auto;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 20px #0001;
        }

        h2 { color: #198754; }

        a {
            display: inline-block;
            background: #198754;
            color: white;
            padding: 12px 22px;
            border-radius: 6px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Registration Successful!</h2>

        <p>Your account has been created successfully.</p>
        <p>You can now log in with your email and password.</p>

        <a href=" {{ route('registration.login') }}">Go to Login</a>
    </div>
</body>
</html>
