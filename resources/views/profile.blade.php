 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px 15px;
            font-family: Arial, sans-serif;
            background: #eef2ff;
            color: #172554;
        }

        .profile {
            max-width: 650px;
            margin: auto;
            padding: 30px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 30px #17255415;
        }

        h1 {
            color: #4059d8;
            text-align: center;
        }

        .picture {
            display: block;
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 50%;
            margin: 20px auto;
            border: 4px solid #dbeafe;
        }

        .details {
            margin-top: 25px;
        }

        .details p {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            overflow-wrap: anywhere;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .button {
            display: inline-block;
            padding: 12px 20px;
            background: #4f5fe8;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .button:hover {
            opacity: 0.9;
        }

        .back {
            background: #475569;
        }

        .empty-picture {
            display: grid;
            place-items: center;
            width: 130px;
            height: 130px;
            margin: 20px auto;
            border-radius: 50%;
            background: #e5e7eb;
            font-size: 50px;
        }
    </style>
</head>

<body>
    <div class="profile">
        <h1>My Profile</h1>

        @if ($user->profile_picture)
            <img
                class="picture"
                src="{{ asset('storage/' . $user->profile_picture) }}"
                alt="Profile Picture"
            >
        @else
            <div class="empty-picture">👤</div>
        @endif

        <div class="details">
            <p><strong>Full Name:</strong> {{ $user->name }}</p>
            <p><strong>Father Name:</strong> {{ $user->father_name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Phone:</strong> {{ $user->phone }}</p>
            <p><strong>Date of Birth:</strong> {{ $user->date_of_birth }}</p>
            <p><strong>Age:</strong> {{ $user->age }}</p>
            <p><strong>Gender:</strong> {{ $user->gender }}</p>
            <p><strong>Address:</strong> {{ $user->address }}</p>
        </div>

        <div class="actions">
            <a href="{{ route('dashboard') }}" class="button back">
                Back to Dashboard
            </a>

            <a href="{{ route('profile.edit') }}" class="button">
                Edit Profile
            </a>
        </div>
    </div>
</body>
</html>
