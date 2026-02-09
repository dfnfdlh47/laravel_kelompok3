<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Risky Futsal') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .auth-bg {
            min-height: 100vh;
            background:
                linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)),
                url('https://images.unsplash.com/photo-1518091043644-c1d4457512c6') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 420px;
            background: linear-gradient(
                160deg,
                rgba(120,0,0,.9),
                rgba(0,0,0,.9)
            );
            padding: 36px;
            border-radius: 16px;
            color: white;
            box-shadow: 0 30px 60px rgba(0,0,0,.8);
            position: relative;
        }

        .auth-title {
            text-align: center;
            margin-bottom: 24px;
        }

        .auth-title h1 {
            color: #facc15;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .auth-title p {
            color: #fca5a5;
            font-size: 13px;
        }

        .auth-wrapper input[type="text"],
        .auth-wrapper input[type="email"],
        .auth-wrapper input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            background: #f9fafb;
            color: #000 !important;
            font-size: 14px;
        }

        .auth-wrapper input::placeholder {
            color: #ffffff;
        }

        .auth-wrapper input:focus {
            outline: none;
            border-color: #dc2626;
            box-shadow: 0 0 0 2px rgba(220,38,38,0.3);
        }

        .close-btn {
            position: absolute;
            top: 14px;
            right: 16px;
            font-size: 22px;
            color: #fff;
            text-decoration: none;
            opacity: .7;
            transition: .25s;
        }

        .close-btn:hover {
            opacity: 1;
            transform: scale(1.1);
        }
    </style>
</head>
<body>

    <div class="auth-bg">
        <div class="auth-wrapper">
            <a href="{{ url('/') }}" class="close-btn">✕</a>

            <div class="auth-title">
                <h1>Risky Futsal</h1>
                <p>Booking Lapangan Futsal</p>
            </div>

            {{ $slot }}
        </div>
    </div>

</body>
</html>
