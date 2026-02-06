<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risky Futsal</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero {
            min-height: 100vh;
            background:
                linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
                url('https://images.unsplash.com/photo-1518091043644-c1d4457512c6') center/cover no-repeat;
            color: white;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 80px;
        }

        nav h1 {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            letter-spacing: 1px;
            color: #fa1515; /* merah */
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 28px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 14px;
            opacity: 0.85;
            transition: 0.3s;
        }

        nav ul li a:hover {
            opacity: 1;
            color: #ef4444; /* merah */
        }

        .content {
            height: calc(100vh - 100px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .content h2 {
            font-family: 'Playfair Display', serif;
            font-size: 46px;
            margin-bottom: 12px;
            letter-spacing: 1px;
        }

        .content h2 span {
            color: #ef4444;
        }

        .content p {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 35px;
        }

        .buttons a {
            background: transparent;
            border: 1px solid #dc2626;
            color: white;
            padding: 12px 28px;
            margin: 0 10px;
            font-size: 13px;
            font-weight: 600;
            border-radius: 8px;
            transition: 0.3s;
        }

        .buttons a.register {
            border: 1px solid #dc2626;
        }

        .buttons a:hover {
            background: #991b1b;
            transform: translateY(-2px);
        }

        .buttons a.register:hover {
            background: #dc2626;
        }

        @media (max-width: 768px) {
            nav {
                padding: 20px 30px;
            }

            .content h2 {
                font-size: 32px;
            }
        }
        .logo img {
                height: 38px;
        }
    </style>
</head>
<body>

<section class="hero">
    <nav>
        <h1>Risky Futsal</h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Prosedur</a></li>
            <li><a href="#">Jam Buka</a></li>
            <li><a href="#">Lapangan</a></li>
            <li><a href="#">Location</a></li>
        </ul>
    </nav>

    <div class="content">
        <h2>PENYEWAAN LAPANGAN<br><span>FUTSAL</span></h2>
        <p>Klik login untuk menyewa lapangan futsal secara online</p>

        <div class="buttons">
            <a href="{{ route('login') }}">LOGIN</a>
            <a href="{{ route('register') }}" class="register">REGISTER</a>
        </div>
    </div>
</section>

</body>
</html>
