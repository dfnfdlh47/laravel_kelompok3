<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>RIZKY FUTSAL - Jam Operasional</title>
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

        /* ================= NAVBAR ================= */
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

        /* ================= HERO ================= */
        .hero {
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

        .hero h2 {
            font-size: 52px;
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .hero h2 span { color: var(--red); }

        .sub-title {
            font-size: 16px;
            color: #aaa;
            margin-bottom: 40px;
            letter-spacing: 1px;
        }

        /* ================= INFO GRID (KE SAMPING) ================= */
        .op-wrapper {
            display: flex;
            gap: 40px;
            border-top: 1px solid rgba(212, 175, 55, 0.3);
            padding-top: 30px;
        }

        .op-box {
            flex: 1;
        }

        .op-box h3 {
            color: var(--gold);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        /* Styling List Harga & Aturan */
        .op-list {
            list-style: none;
        }

        .op-list li {
            font-size: 15px;
            margin-bottom: 10px;
            color: #eee;
            display: flex;
            justify-content: space-between;
        }

        .op-list li span {
            color: var(--white);
            font-weight: 600;
        }

        .status-text {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .check-mark {
            color: var(--gold);
            margin-right: 8px;
        }

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
            .op-wrapper { flex-direction: column; gap: 40px; }
            nav { padding: 20px 30px; }
            .hero { padding: 0 30px; }
            .hero h2 { font-size: 35px; }
        }
        
        .price-container {
    max-width: 320px; /* Batasi lebar maksimal agar jam & harga berdekatan */
    margin-top: 15px;
}

.price-row {
    display: flex;
    justify-content: space-between; /* Menjaga jam di kiri & harga di kanan dalam batas 320px */
    gap: 30px; /* Jarak minimal antar jam dan harga */
    padding: 10px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.price-row .time {
    font-size: 15px;
    color: #bbb;
}

.price-row .price {
    font-size: 16px;
    font-weight: 700;
    color: var(--white);
    white-space: nowrap; /* Supaya harga tidak turun ke bawah */
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

<div class="hero">          
    <div class="hero-content">
        <h2>JAM <span>OPERASIONAL</span></h2>
        <p class="sub-title">Informasi jadwal, tarif sewa, dan ketentuan booking lapangan.</p>

        <div class="op-wrapper">
            <div class="op-box">
                <h3>Jadwal Buka</h3>
                <p class="status-text">Setiap Hari</p>
                <p style="color: var(--gold);">07.00 - 23.00 WIB</p>
            </div>
            
<div class="op-box">
    <h3>Harga Sewa</h3>
    
    <div class="price-container">
        <div class="price-row">
            <span class="time">07.00 - 15.00</span>
            <span class="price">Rp 100.000</span>
        </div>

        <div class="price-row">
            <span class="time">15.00 - 16.00</span>
            <span class="price">Rp 130.000</span>
        </div>

        <div class="price-row">
            <span class="time">17.00 - 18.00</span>
            <span class="price">Rp 140.000</span>
        </div>

        <div class="price-row">
            <span class="time">18.00 - 23.00</span>
            <span class="price">Rp 155.000</span>
        </div>
    </div>
</div>

            <div class="op-box">
                <h3>Aturan Booking</h3>
                <ul class="op-list">
                    <li><p><span class="check-mark">✔</span> Maximal booking sebelum jam 21.00</p></li>
                    <li><p><span class="check-mark">✔</span> Harap datang tepat waktu</p></li>
                    <li><p><span class="check-mark">✔</span> Pembayaran sesuai waktu dipilih</p></li>
                    <li><p><span class="check-mark">✔</span> Free Aqua Gelass 1 Kardus</p></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<footer>
    © {{ date('Y') }} RIZKY FUTSAL. All Rights Reserved.
</footer>

</body>
</html>