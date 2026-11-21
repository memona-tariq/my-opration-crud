
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 30px 15px;
            font-family: Arial, sans-serif;
            background: #eef2ff;
            color: #172554;
        }

        .container {
            max-width: 700px;
            margin: auto;
            padding: 30px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 30px #17255415;
        }

        h1 {
            text-align: center;
            color: #4059d8;
        }

        .picture {
            display: block;
            width: 110px;
            height: 110px;
            margin: 20px auto;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #dbeafe;
        }

        label {
            display: block;
            margin: 15px 0 7px;
            font-weight: bold;
            font-size: 14px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d5dcf0;
            border-radius: 8px;
            font: inherit;
        }

        textarea {
            resize: vertical;
            min-height: 90px;
        }

        .button {
            display: inline-block;
            padding: 12px 18px;
            border: 0;
            border-radius: 8px;
            background: #4f5fe8;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .back { background: #475569; }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .errors {
            padding: 12px;
            background: #fee2e2;
            color: #991b1b;
            border-radius: 8px;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Edit Profile</h1>

    @if ($errors->any())
        <div class="errors">
            <strong>Please correct these errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($user->profile_picture)
        <img
            class="picture"
            src="{{ asset('storage/' . $user->profile_picture) }}"
            alt="Current Profile Picture"
        >
    @else
        <div class="picture" style="display:grid;place-items:center;font-size:40px;">
            👤
        </div>
    @endif

    <form action="{{ route('profile.update') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="full_name">Full Name</label>
        <input id="full_name" name="full_name" type="text"
               value="{{ old('full_name', $user->name) }}" required>

        <label for="father_name">Father Name</label>
        <input id="father_name" name="father_name" type="text"
               value="{{ old('father_name', $user->father_name) }}" required>

        <label for="email">Email Address</label>
        <input id="email" type="email"
               value="{{ $user->email }}" disabled>
        <small>Email cannot be changed here.</small>

        <label for="phone">Phone</label>
        <input id="phone" name="phone" type="text"
               value="{{ old('phone', $user->phone) }}" required>

        <label for="date_of_birth">Date of Birth</label>
        <input id="date_of_birth" name="date_of_birth" type="date"
               value="{{ old('date_of_birth', optional($user->date_of_birth)->format('Y-m-d') ?? $user->date_of_birth) }}"
               max="{{ date('Y-m-d', strtotime('-1 day')) }}" required>

        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
            <option value="Male" @selected(old('gender', $user->gender) == 'Male')>Male</option>
            <option value="Female" @selected(old('gender', $user->gender) == 'Female')>Female</option>
            <option value="Other" @selected(old('gender', $user->gender) == 'Other')>Other</option>
        </select>

        <label for="age">Age</label>
        <input id="age" name="age" type="number" min="1" max="120"
               value="{{ old('age', $user->age) }}" required>

        <label for="address">Address</label>
        <textarea id="address" name="address" required>{{ old('address', $user->address) }}</textarea>

        <label for="picture">Change Profile Picture (optional)</label>
        <input id="picture" name="picture" type="file"
               accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">

        <div class="actions">
            <button type="submit" class="button">Save Changes</button>
            <a href="{{ route('profile') }}" class="button back">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
