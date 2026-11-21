 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3f5fb;
            color: #25304a;
        }

        .navbar {
            background: #ffffff;
            padding: 18px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        }

        .logo {
            font-size: 23px;
            font-weight: bold;
            color: #3547a8;
        }

        .logout-btn {
            background: #fff0f0;
            color: #d13c4b;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .logout-btn:hover {
            background: #ffdddd;
        }

        .container {
            max-width: 1100px;
            width: 90%;
            margin: 35px auto;
        }

        .welcome-card {
            background: linear-gradient(120deg, #3547a8, #7655e8);
            color: white;
            padding: 35px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            box-shadow: 0 10px 25px rgba(70, 70, 160, 0.16);
        }

        .welcome-info {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            background: #e6e9f5;
        }

        .welcome-text h1 {
            font-size: 28px;
            margin-bottom: 12px;
        }

        .welcome-text p {
            font-size: 15px;
            line-height: 1.6;
            color: #f0efff;
        }

        .edit-btn {
            display: inline-block;
            background: white;
            color: #4a46b8;
            padding: 12px 20px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: bold;
            white-space: nowrap;
        }

        .edit-btn:hover {
            background: #eeedff;
        }

        .section-heading {
            margin: 32px 0 18px;
            font-size: 22px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .card {
            background: white;
            padding: 26px;
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(30, 45, 90, 0.06);
            border: 1px solid #e9ecf5;
        }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #eeedff;
            color: #5148c8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 18px;
        }

        .card h3 {
            font-size: 19px;
            margin-bottom: 10px;
        }

        .card p {
            color: #737d91;
            line-height: 1.6;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .card-link {
            color: #4b49bd;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        .card-link:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            padding: 25px 10px;
            color: #8991a5;
            font-size: 13px;
        }

        @media (max-width: 650px) {
            .navbar {
                padding: 16px 5%;
            }

            .container {
                width: 92%;
                margin-top: 22px;
            }

            .welcome-card {
                padding: 24px 20px;
                flex-direction: column;
                align-items: flex-start;
            }

            .welcome-info {
                align-items: flex-start;
                flex-direction: column;
            }

            .welcome-text h1 {
                font-size: 23px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">
        <div class="logo">🎓 Student Portal</div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </header>

    <main class="container">

        <section class="welcome-card">
            <div class="welcome-info">

                @if($user->profile_picture)
                    <img
                        src="{{ asset('storage/' . $user->profile_picture) }}"
                        alt="Profile Picture"
                        class="profile-img"
                    >
                @else
                    <div class="profile-img"></div>
                @endif

                <div class="welcome-text">
                    <h1>Welcome, {{ $user->name }}!</h1>
                    <p>
                        You have successfully logged in to your student account.
                        Manage your profile and registration details here.
                    </p>
                </div>
            </div>

            <a href="{{ route('profile.edit') }}" class="edit-btn">
                Edit Profile
            </a>
        </section>

        <h2 class="section-heading">Your Dashboard</h2>

        <section class="cards">

            <div class="card">
                <div class="card-icon">👤</div>
                <h3>My Profile</h3>
                <p>
                    View your personal information, contact details,
                    and registration information.
                </p>
                <a href="{{ route('profile') }}" class="card-link">
                    View Profile →
                </a>
            </div>

            <div class="card">
                <div class="card-icon">⚙️</div>
                <h3>Account Settings</h3>
                <p>
                    Update your personal details and profile picture
                    whenever you need to.
                </p>
                <a href="{{ route('profile.edit') }}" class="card-link">
                    Manage Account →
                </a>
            </div>

        </section>

    </main>

    <footer class="footer">
        © {{ date('Y') }} Student Portal. All rights reserved.
    </footer>

</body>
</html>
