 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 25px;
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #edf2ff, #f4f0ff);
            color: #172554;
        }

        .topbar {
            max-width: 1250px;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .brand {
            font-size: 25px;
            font-weight: 800;
            color: #172554;
        }

        .brand span {
            color: #477cff;
        }

        .tagline {
            color: #52648a;
            font-size: 14px;
        }

        .main-container {
            max-width: 1250px;
            margin: auto;
            display: grid;
            grid-template-columns: 0.85fr 1.35fr;
            background: white;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 18px 55px rgba(35, 53, 110, 0.15);
        }

        /* LEFT WELCOME PANEL */

        .welcome-panel {
            position: relative;
            overflow: hidden;
            padding: 55px 38px;
            color: white;
            background:
                radial-gradient(circle at 100% 5%, #345db6 0, transparent 34%),
                linear-gradient(145deg, #102c59, #183e7b 60%, #344c9c);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .welcome-label {
            color: #cbdcff;
            font-size: 17px;
            margin-bottom: 10px;
        }

        .welcome-panel h1 {
            margin: 0 0 20px;
            font-size: clamp(30px, 3vw, 43px);
            line-height: 1.18;
            letter-spacing: -1px;
        }

        .welcome-panel h1 span {
            color: #72a4ff;
        }

        .welcome-description {
            color: #d7e3ff;
            font-size: 15px;
            line-height: 1.9;
            margin-bottom: 30px;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 13px 0;
        }

        .feature-icon {
            width: 46px;
            height: 46px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 14px;
            background: linear-gradient(135deg, #36c9b2, #2187dc);
            font-size: 21px;
        }

        .feature:nth-of-type(2) .feature-icon {
            background: linear-gradient(135deg, #a78bfa, #6652e8);
        }

        .feature:nth-of-type(3) .feature-icon {
            background: linear-gradient(135deg, #ffc46a, #f18c37);
        }

        .feature strong {
            display: block;
            font-size: 15px;
            margin-bottom: 4px;
        }

        .feature small {
            color: #c5d6f7;
            font-size: 12px;
        }

        .welcome-footer {
            margin-top: 42px;
            padding-top: 20px;
            border-top: 1px solid #ffffff30;
            color: #cbdcff;
            font-size: 14px;
            font-style: italic;
            line-height: 1.8;
        }

        /* RIGHT FORM PANEL */

        .form-panel {
            padding: 38px 42px;
            min-width: 0;
        }

        .form-heading {
            display: flex;
            align-items: center;
            gap: 17px;
            margin-bottom: 27px;
        }

        .heading-icon {
            width: 65px;
            height: 65px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #e9efff;
            color: #477cff;
            font-size: 30px;
        }

        .form-heading h2 {
            font-size: 25px;
            margin: 0 0 7px;
            color: #172554;
        }

        .form-heading p {
            margin: 0;
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            column-gap: 22px;
            row-gap: 17px;
        }

        .field {
            min-width: 0;
        }

        .field.full-width {
            grid-column: 1 / -1;
        }

        .field label {
            display: block;
            color: #263765;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .required {
            color: #e34c67;
        }

        .field input:not([type="radio"]),
        .field textarea,
        .field select {
            width: 100%;
            min-width: 0;
            padding: 12px 13px;
            border: 1px solid #d4def7;
            border-radius: 9px;
            background: #fbfcff;
            color: #172554;
            font-family: inherit;
            font-size: 13px;
            transition: 0.2s;
        }

        .field input:focus,
        .field textarea:focus,
        .field select:focus {
            outline: none;
            border-color: #6578f5;
            background: white;
            box-shadow: 0 0 0 3px #6578f51c;
        }

        .field input[type="file"] {
            padding: 9px !important;
        }

        .field textarea {
            resize: vertical;
            min-height: 80px;
        }

        .gender-options {
            min-height: 43px;
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
            padding: 10px 12px;
            background: #fbfcff;
            border: 1px solid #d4def7;
            border-radius: 9px;
        }

        .gender-options label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin: 0;
            font-size: 13px;
            font-weight: 500;
        }

        .gender-options input {
            accent-color: #5b63ed;
        }

        .help-text {
            margin: 7px 0 0;
            color: #64748b;
            font-size: 11px;
            line-height: 1.6;
        }

        .error {
            margin: 6px 0 0;
            color: #dc2626;
            font-size: 12px;
        }

        .register-button {
            width: 100%;
            padding: 15px;
            margin-top: 25px;
            border: none;
            border-radius: 10px;
            color: white;
            background: linear-gradient(100deg, #377dff, #8052ed);
            box-shadow: 0 7px 18px #6559e633;
            font-size: 16px;
            font-weight: 750;
            cursor: pointer;
            transition: 0.2s;
        }

        .register-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px #6559e644;
        }

        .login-link {
            text-align: center;
            margin-top: 23px;
            font-size: 13px;
            color: #64748b;
        }

        .login-link a {
            color: #4d63e8;
            text-decoration: none;
            font-weight: 750;
            margin-left: 5px;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 900px) {
            body {
                padding: 18px;
            }

            .main-container {
                grid-template-columns: 1fr;
            }

            .welcome-panel {
                padding: 35px 30px;
            }

            .welcome-footer {
                margin-top: 25px;
            }

            .form-panel {
                padding: 32px;
            }
        }

        @media (max-width: 520px) {
            body {
                padding: 12px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                margin-bottom: 18px;
            }

            .brand {
                font-size: 22px;
            }

            .welcome-panel {
                padding: 28px 23px;
            }

            .welcome-panel h1 {
                font-size: 32px;
            }

            .form-panel {
                padding: 25px 18px;
            }

            .form-heading {
                align-items: flex-start;
                gap: 12px;
            }

            .heading-icon {
                width: 48px;
                height: 48px;
                font-size: 23px;
            }

            .form-heading h2 {
                font-size: 21px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                row-gap: 15px;
            }

            .field.full-width {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>

    <header class="topbar">
        <div class="brand">🎓 Student <span>Registration</span></div>
        <div class="tagline">✦ Build Your Future With Us</div>
    </header>

    <main class="main-container">

        <!-- LEFT WELCOME PANEL -->

        <section class="welcome-panel">
            <div class="welcome-label">Welcome to</div>

            <h1>Student <span>Registration</span></h1>

            <p class="welcome-description">
                Join our community and take the first step towards
                a brighter future. Complete your registration to get started.
            </p>

            <div class="feature">
                <div class="feature-icon">✓</div>
                <div>
                    <strong>Secure &amp; Safe</strong>
                    <small>Your information is handled securely.</small>
                </div>
            </div>

            <div class="feature">
                <div class="feature-icon">🎓</div>
                <div>
                    <strong>Quality Education</strong>
                    <small>Learn, grow and build your skills.</small>
                </div>
            </div>

            <div class="feature">
                <div class="feature-icon">✦</div>
                <div>
                    <strong>A Better Future</strong>
                    <small>Your journey starts here.</small>
                </div>
            </div>

            <div class="welcome-footer">
                “Education is the key to unlock your future.”
            </div>
        </section>

        <!-- RIGHT REGISTRATION FORM -->

        <section class="form-panel">

            <div class="form-heading">
                <div class="heading-icon">♟</div>
                <div>
                    <h2>Create Your Account</h2>
                    <p>Please fill in all required information to register.</p>
                </div>
            </div>

            <form action="{{ route('register') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="form-grid">

                    <div class="field">
                        <label for="full_name">
                            Full Name <span class="required">*</span>
                        </label>
                        <input type="text" id="full_name" name="full_name"
                               value="{{ old('full_name') }}"
                               placeholder="Enter your full name" required>
                        @error('full_name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="father_name">
                            Father's Name <span class="required">*</span>
                        </label>
                        <input type="text" id="father_name" name="father_name"
                               value="{{ old('father_name') }}"
                               placeholder="Enter father's name" required>
                        @error('father_name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">
                            Email Address <span class="required">*</span>
                        </label>
                        <input type="email" id="email" name="email"
                               value="{{ old('email') }}"
                               placeholder="Enter your email" required>
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="phone">
                            Phone Number <span class="required">*</span>
                        </label>
                        <input type="tel" id="phone" name="phone"
                               value="{{ old('phone') }}"
                               placeholder="Enter your phone number" required>
                        @error('phone')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="date_of_birth">
                            Date of Birth <span class="required">*</span>
                        </label>
                        <input type="date" id="date_of_birth"
                               name="date_of_birth"
                               value="{{ old('date_of_birth') }}"
                               max="{{ date('Y-m-d') }}" required>
                        @error('date_of_birth')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="gender">
                            Gender <span class="required">*</span>
                        </label>
                        <select id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="age">
                            Age <span class="required">*</span>
                        </label>
                        <input type="number" id="age" name="age"
                               value="{{ old('age') }}"
                               min="1" max="120"
                               placeholder="Enter your age" required>
                        @error('age')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="address">
                            Address <span class="required">*</span>
                        </label>
                        <input type="text" id="address" name="address"
                               value="{{ old('address') }}"
                               placeholder="Enter your complete address" required>
                        @error('address')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field full-width">
                        <label for="picture">
                            Profile Picture <span class="required">*</span>
                        </label>
                        <input type="file" id="picture" name="picture"
                               accept=".jpg,.jpeg,.png,.webp" required>
                        <p class="help-text">
                            Allowed formats: JPG, JPEG, PNG, WEBP. Maximum size: 2 MB.
                        </p>
                        @error('picture')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field full-width">
                        <label for="password">
                            Password <span class="required">*</span>
                        </label>
                        <input type="password" id="password" name="password"
                               minlength="8"
                               placeholder="Create a password (8+ characters)"
                               autocomplete="new-password" required>
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field full-width">
                        <label for="password_confirmation">
                            Confirm Password <span class="required">*</span>
                        </label>
                        <input type="password" id="password_confirmation"
                               name="password_confirmation" minlength="8"
                               placeholder="Enter your password again"
                               autocomplete="new-password" required>
                    </div>

                </div>

                <button type="submit" class="register-button">
                    ✦ &nbsp; Register Now
                </button>

            </form>

            <div class="login-link">
                Already have an account?
                <a href="{{ route('registration.login') }}">Login</a>
            </div>

        </section>

    </main>

</body>
</html>
