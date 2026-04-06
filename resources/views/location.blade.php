<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>RIZKY FUTSAL - Lokasi Kami</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --black: #000000;
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
            overflow-x: hidden;
        }

        /* ================= NAVBAR (DISAMAKAN) ================= */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 24px 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(to bottom, rgba(0,0,0,0.9), rgba(0,0,0,0));
            backdrop-filter: blur(8px);
            z-index: 100;
        }

        nav h1 {
            font-size: 22px;
            font-weight: 700;
            color: var(--red);
            letter-spacing: 1px;
        }

        nav .menu a {
            color: var(--white);
            text-decoration: none;
            margin-left: 28px;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
        }

        nav .menu a:hover { color: var(--gold); }

        /* ================= HERO SECTION (BG DISAMAKAN) ================= */
        .hero-location {
            height: 100vh;
            padding: 0 80px;
            display: flex;
            align-items: center;
            background: 
                linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)),
                url('https://images.unsplash.com/photo-1518091043644-c1d4457512c6') 
                center / cover no-repeat;
        }

        .hero-content {
            width: 100%;
        }

        .hero-location h2 {
            font-size: 52px;
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
            color: var(--white);
        }

        .hero-location h2 span { color: var(--red); }

        .sub-title {
            font-size: 16px;
            color: #aaa;
            margin-bottom: 40px;
            letter-spacing: 1px;
        }

        /* ================= INFO & MAP WRAPPER ================= */
        .loc-wrapper {
            display: flex;
            gap: 50px;
            border-top: 1px solid rgba(212, 175, 55, 0.3);
            padding-top: 30px;
            align-items: flex-start;
        }

        .loc-info { flex: 1; }
        .loc-map { flex: 1.5; }

        .loc-info h3, .loc-map h3 {
            color: var(--gold);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        .loc-info p {
            font-size: 20px;
            font-weight: 600;
            line-height: 1.6;
            margin-bottom: 30px;
            color: var(--white);
        }

        .btn-maps {
            display: inline-block;
            padding: 14px 35px;
            border: 2px solid var(--red);
            color: var(--white);
            text-decoration: none;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
        }

        .btn-maps:hover {
            background: var(--red);
            box-shadow: 0 0 20px rgba(225, 6, 0, 0.4);
        }

        .map-frame {
            width: 100%;
            height: 300px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 4px;
            filter: grayscale(0.5) contrast(1.1) invert(0.9);
            transition: 0.5s;
        }

        .map-frame:hover { filter: grayscale(0) invert(0); }

        /* ================= FOOTER ================= */
        footer {
            position: absolute;
            bottom: 30px;
            width: 100%;
            text-align: center;
            color: #555;
            font-size: 12px;
        }

        @media (max-width: 992px) {
            nav { padding: 20px 30px; }
            .hero-location { padding: 0 30px; }
            .loc-wrapper { flex-direction: column; gap: 40px; }
            .hero-location h2 { font-size: 35px; }
        }
    </style>
</head>
<body>

<nav>
    <h1>RIZKY FUTSAL</h1>
    <div class="menu">
        @auth
            <a href="{{ url('home') }}">Home</a>
            <a href="{{ route('jambuka') }}">Jam Buka</a>
            <a href="{{ route('lapangan.index') }}">Lapangan</a>
            <a href="{{ route('location') }}">Location</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" style="background:none; border:none; color:white; margin-left:28px; font-size:14px; font-weight:500; cursor:pointer;">Logout</button>
            </form>
        @endauth
    </div>
</nav>

<div class="hero-location">
    <div class="hero-content">
        <h2>LOKASI <span>KAMI</span></h2>
        <p class="sub-title">Kunjungi arena futsal terbaik di pusat Kota Cirebon.</p>

        <div class="loc-wrapper">
            <div class="loc-info">
                <h3>Alamat Utama</h3>
                <p>
                    Jl. Pangeran Drajat No.38, Jagasatru,<br>
                    Pekalipan, Kota Cirebon,<br>
                    Jawa Barat
                </p>
                <a href="https://maps.google.com" target="_blank" class="btn-maps">
                    📍 Buka di Google Maps
                </a>
            </div>

            <div class="loc-map">
                <h3>Google Maps Preview</h3>
                <iframe 
                    class="map-frame"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.3385289547!2d108.5583569!3d-6.728211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2bee2117559e846b%3A0xb35f29d27f677b1e!2sJl.%20Pangeran%20Drajat%20No.38%2C%20Jagasatru%2C%20Kec.%20Pekalipan%2C%20Kota%20Cirebon%2C%20Jawa%20Barat%2045115!5e0!3m2!1sid!2sid!4v1710000000000" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</div>

<footer>
    © {{ date('Y') }} RIZKY FUTSAL. All Rights Reserved.
</footer>

</body>
</html>