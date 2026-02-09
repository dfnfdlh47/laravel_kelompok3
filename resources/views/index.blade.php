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

        /* ================= NAVBAR ================= */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 24px 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;

            background: linear-gradient(
                to bottom,
                rgba(0,0,0,0.65),
                rgba(0,0,0,0.35),
                rgba(0,0,0,0)
            );

            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
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
            position: relative;
            transition: 0.3s;
        }

        nav .menu a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 0;
            height: 2px;
            background: var(--gold);
            transition: 0.3s;
        }

        nav .menu a:hover {
            color: var(--gold);
        }

        nav .menu a:hover::after {
            width: 100%;
        }

        /* ================= HERO ================= */
        .hero {
            height: 100vh;
            padding: 120px 80px 0;
            display: flex;
            align-items: center;

            background:
                linear-gradient(
                    rgba(0,0,0,0.85),
                    rgba(0,0,0,0.85)
                ),
                url('https://images.unsplash.com/photo-1518091043644-c1d4457512c6')
                center / cover no-repeat;
        }

        .hero-content {
            max-width: 620px;
        }

        .hero h2 {
            font-size: 52px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero h2 span {
            color: var(--red);
        }

        .hero p {
            font-size: 18px;
            color: #ccc;
            margin-bottom: 40px;
        }

        .btn {
            padding: 14px 42px;
            border: 2px solid var(--red);
            color: var(--white);
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn:hover {
            background: linear-gradient(135deg, var(--red), var(--gold));
            color: var(--black);
        }

        /* ================= SECTION ================= */
        section {
            padding: 100px 80px;
            background: var(--black);
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h3 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #aaa;
        }

        /* ================= FEATURES ================= */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .feature-box {
            border: 1px solid var(--gold);
            background: rgba(0,0,0,0.6);
            padding: 40px;
            text-align: center;
            transition: 0.3s;
        }

        .feature-box h4 {
            color: var(--gold);
            margin-bottom: 15px;
        }

        .feature-box p {
            color: #aaa;
            font-size: 14px;
        }

        .feature-box:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(212,175,55,0.25);
        }

        /* ================= FOOTER ================= */
        footer {
            padding: 30px;
            text-align: center;
            background: #0b0b0b;
            color: var(--gold);
            font-size: 14px;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 768px) {
            nav {
                padding: 20px 30px;
            }

            nav .menu a {
                margin-left: 18px;
            }

            .hero {
                padding: 120px 30px 0;
            }

            section {
                padding: 80px 30px;
            }

            .hero h2 {
                font-size: 38px;
            }
        }
    </style>
</head>
<body>

<!-- ================= NAVBAR ================= -->
<nav>
    <h1>RIZKY FUTSAL</h1>
    <div class="menu">
        <a href="#">Home</a>
        <a href="#">Prosedur</a>
        <a href="#">Jam Buka</a>
        <a href="#">Lapangan</a>
        <a href="#">Location</a>
    </div>
</nav>

<!-- ================= HERO ================= -->
<div class="hero">
    <div class="hero-content">
        <h2>PENYEWAAN LAPANGAN <span>FUTSAL</span></h2>
        <p>
            Arena futsal premium dengan fasilitas terbaik, standar profesional,
            dan suasana eksklusif untuk pengalaman bermain terbaikmu.
        </p>
        <a href="#" class="btn">Booking Sekarang</a>
    </div>
</div>

<!-- ================= FEATURES ================= -->
<section>
    <div class="section-title">
        <h3>Kenapa Memilih Kami</h3>
        <p>Standar internasional untuk pengalaman bermain terbaik</p>
    </div>

    <div class="features">
        <div class="feature-box">
            <h4>Lapangan Premium</h4>
            <p>Rumput sintetis berkualitas tinggi dan aman untuk profesional.</p>
        </div>

        <div class="feature-box">
            <h4>Pencahayaan Optimal</h4>
            <p>Sistem lampu modern untuk kenyamanan bermain malam hari.</p>
        </div>

        <div class="feature-box">
            <h4>Booking Online</h4>
            <p>Sistem pemesanan cepat, mudah, dan transparan.</p>
        </div>
    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer>
    © {{ date('Y') }} RIZKY FUTSAL. All Rights Reserved.
</footer>

</body>
</html>
