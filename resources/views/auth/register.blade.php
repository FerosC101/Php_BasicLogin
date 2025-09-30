<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - Resume Access</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f5f5f5;
            line-height: 1.6;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            width: 100%;
        }
        .login-container {
            background: white;
            padding: 50px 40px;
            border: 1px solid #000;
        }
        h2 {
            text-align: center;
            font-size: 24px;
            font-weight: normal;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #000;
        }
        .text-muted {
            text-align: center;
            font-size: 14px;
            margin-bottom: 40px;
            color: #555;
        }
        .divider {
            border-bottom: 2px solid #000;
            margin: 30px 0;
        }
        .mb-3, .mb-4 {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #000;
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
        }
        .form-control:focus {
            outline: none;
            border: 2px solid #000;
        }
        .btn {
            width: 100%;
            padding: 15px;
            background: #000;
            color: #fff;
            border: none;
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn:hover {
            background: #333;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #000;
            background: #f9f9f9;
            font-size: 13px;
        }
        .alert-danger {
            color: #d8000c;
            border-color: #d8000c;
        }
        .text-center {
            text-align: center;
        }
        .mt-4 {
            margin-top: 25px;
        }
        .text-decoration-none {
            color: #000;
            text-decoration: underline;
            font-size: 13px;
        }
        .fas, .fa-user-plus, .fa-user, .fa-envelope, .fa-lock, .fa-exclamation-triangle {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2>Resume Access</h2>
            <p class="text-muted">Create New Account</p>
            
            <div class="divider"></div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required minlength="6">
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>

                <button type="submit" class="btn">Register</button>
            </form>

            <div class="text-center mt-4">
                <p><a href="{{ route('login') }}" class="text-decoration-none">Already have an account? Login here</a></p>
            </div>
        </div>
    </div>
</body>
</html>