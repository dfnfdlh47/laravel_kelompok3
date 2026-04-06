<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>RIZKY FUTSAL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --black: #000000;
            --red-dark: #b30000;
            --red: #e10600;
            --gold: #d4af37;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--black);
            color: var(--white);
        }

        nav {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 24px 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(to bottom, rgba(0,0,0,0.65), rgba(0,0,0,0.35), rgba(0,0,0,0));
            backdrop-filter: blur(6px);
            z-index: 100;
        }

        nav h1 {
            font-size: 22px;
            font-weight: 700;
            color: var(--red);
        }

        nav .menu a {
            color: var(--white);
            text-decoration: none;
            margin-left: 28px;
            font-size: 14px;
        }

        .hero {
            height: 100vh;
            padding: 120px 80px 0;
            display: flex;
            align-items: center;
            background: linear-gradient(rgba(0,0,0,0.85), rgba(0,0,0,0.85)),
                        url('https://images.unsplash.com/photo-1518091043644-c1d4457512c6') center/cover no-repeat;
        }

        .hero-content {
            max-width: 620px;
        }

        .hero h2 {
            font-size: 52px;
        }

        .btn {
            padding: 14px 42px;
            border: 2px solid var(--red);
            color: var(--white);
            text-decoration: none;
        }

        section {
            padding: 100px 80px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .feature-box {
            border: 1px solid var(--gold);
            padding: 40px;
            text-align: center;
        }

        footer {
            padding: 30px;
            text-align: center;
            background: #0b0b0b;
            color: var(--gold);
        }
    </style>
</head>
<body>

<nav>
    <h1>RIZKY FUTSAL</h1>

    <div class="menu">
        @auth
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('jambuka') }}">Jam Buka</a>
            <a href="{{ route('lapangan.index') }}">Lapangan</a>
            <a href="{{ route('location') }}">Location</a>

            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" style="background:none;border:none;color:white;margin-left:28px;cursor:pointer;">
                    Logout
                </button>
            </form>
        @endauth

        @guest
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endguest
    </div>
</nav>

<div class="hero">
    <div class="hero-content">
        <h2>PENYEWAAN LAPANGAN <span>FUTSAL</span></h2>
        <p>Arena futsal premium dengan fasilitas terbaik.</p>
        <a href="#" class="btn">Booking Sekarang</a>
    </div>
</div>

<section>
    <h3>Kenapa Memilih Kami</h3>
    <div class="features">
        <div class="feature-box">Lapangan Premium</div>
        <div class="feature-box">Pencahayaan Optimal</div>
        <div class="feature-box">Booking Online</div>
    </div>
</section>

<section>
    <h3>Fasilitas</h3>
    <div class="features">
        <div class="feature-box">Kantin</div>
        <div class="feature-box">Mushola</div>
        <div class="feature-box">Kamar Mandi</div>
        <div class="feature-box">Parkiran</div>
    </div>
</section>

<footer>
    © {{ date('Y') }} RIZKY FUTSAL
</footer>

</body>
</html>