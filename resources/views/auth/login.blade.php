<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Resume Access</title>
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
            background: white;
            padding: 50px 40px;
            border: 1px solid #000;
        }
        h1 {
            text-align: center;
            font-size: 24px;
            font-weight: normal;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .subtitle {
            text-align: center;
            font-size: 14px;
            margin-bottom: 40px;
            color: #555;
        }
        .divider {
            border-bottom: 2px solid #000;
            margin: 30px 0;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #000;
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
        }
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border: 2px solid #000;
        }
        .checkbox-group {
            margin: 20px 0;
        }
        .checkbox-group input[type="checkbox"] {
            margin-right: 8px;
        }
        .checkbox-group label {
            display: inline;
            font-weight: normal;
            text-transform: none;
            letter-spacing: normal;
            font-size: 13px;
        }
        button {
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
        button:hover {
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
        .alert-success {
            color: #4f8a10;
            border-color: #4f8a10;
        }
        .text-center {
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
        }
        .text-center a {
            color: #000;
            text-decoration: underline;
        }
        .demo-credentials {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            background: #fafafa;
            font-size: 12px;
            line-height: 1.8;
        }
        .demo-credentials strong {
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resume Access</h1>
        <p class="subtitle">Authentication Required</p>
        
        <div class="divider"></div>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>

            <button type="submit">Login</button>
        </form>

        <div class="text-center">
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        </div>

        <div class="demo-credentials">
            <strong>Demo Credentials:</strong><br>
            admin@resume.com / admin123<br>
            vincevillar02@gmail.com / vince123
        </div>
    </div>
</body>
</html>