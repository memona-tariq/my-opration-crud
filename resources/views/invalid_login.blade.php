
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Failed</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff0f0;
            text-align: center;
            padding: 70px 20px;
        }

        .box {
            background: white;
            max-width: 420px;
            margin: auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px #0001;
        }

        h2 { color: #c62828; }

        a {
            display: inline-block;
            background: #174a70;
            color: white;
            padding: 12px 22px;
            text-decoration: none;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Login Failed!</h2>

        <p>Invalid email or password.</p>
        <p>Please check your details and try again.</p>

        <a href=" {{ route('registration.login') }}">Try Again</a>
    </div>
</body>
</html>
