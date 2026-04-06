<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>RIZKY FUTSAL - Daftar Lapangan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --black: #000000;
            --red: #e10600;
            --gold: #d4af37;
            --white: #ffffff;
            --card-bg: rgba(17, 17, 17, 0.9);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: var(--black); color: var(--white); overflow-x: hidden; }

        nav {
            position: fixed; top: 0; width: 100%;
            padding: 24px 80px;
            display: flex; justify-content: space-between; align-items: center;
            background: linear-gradient(to bottom, rgba(0,0,0,0.9), rgba(0,0,0,0));
            backdrop-filter: blur(8px); z-index: 100;
        }

        nav h1 { font-size: 22px; color: var(--red); font-weight: 700; }
        nav .menu a { color: var(--white); text-decoration: none; margin-left: 28px; font-size: 14px; transition: 0.3s; }
        nav .menu a:hover { color: var(--gold); }

        .hero-bg {
            min-height: 100vh;
            padding: 120px 80px 80px 80px;
            background: linear-gradient(rgba(0,0,0,0.85), rgba(0,0,0,0.85)), url('https://images.unsplash.com/photo-1518091043644-c1d4457512c6') center / cover no-repeat fixed;
            display: flex; flex-direction: column;
        }

        .page-header { margin-bottom: 40px; border-bottom: 1px solid rgba(212, 175, 55, 0.3); padding-bottom: 20px; }
        .page-header h2 { font-size: 52px; text-transform: uppercase; font-weight: 700; }
        .page-header h2 span { color: var(--red); }

        .lapangan-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 40px; }
        .lapangan-card { background-color: var(--card-bg); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 15px; overflow: hidden; transition: 0.4s; backdrop-filter: blur(10px); }
        .lapangan-card:hover { transform: translateY(-10px); border-color: var(--gold); box-shadow: 0 15px 30px rgba(0,0,0,0.5); }

        .card-image { width: 100%; height: 250px; overflow: hidden; }
        .card-image img { width: 100%; height: 100%; object-fit: cover; }

        .card-details { padding: 30px; }
        .card-details h3 { font-size: 26px; margin-bottom: 20px; color: var(--white); }

        .price-item { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.05); font-size: 14px; }
        .price-item span { color: #bbb; }
        .price-item strong { color: var(--gold); }

        .btn-booking {
            display: block; width: 100%; text-align: center; margin-top: 25px; padding: 14px 0;
            border: 2px solid var(--red); color: var(--white); text-decoration: none; font-weight: 700;
            text-transform: uppercase; transition: 0.3s; border-radius: 8px;
        }
        .btn-booking:hover { background-color: var(--red); box-shadow: 0 0 20px rgba(225, 6, 0, 0.5); }

        footer { padding: 40px 0; text-align: center; color: #555; background-color: #000; font-size: 12px; }

        @media (max-width: 992px) {
            .lapangan-grid { grid-template-columns: 1fr; }
            .hero-bg { padding: 100px 30px; }
            nav { padding: 20px 30px; }
            .page-header h2 { font-size: 35px; }
        }
    </style>
</head>
<body>

<nav>
    <h1>RIZKY FUTSAL</h1>
    <div class="menu">
        @auth
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('jambuka') }}">Jam Buka</a>
            <a href="{{ route('lapangan.index') }}">Lapangan</a>
            <a href="{{ route('location') }}">Location</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" style="background:none; border:none; color:white; margin-left:28px; font-size:14px; cursor:pointer;">Logout</button>
            </form>
        @endauth
    </div>
</nav>

<div class="hero-bg">
    <div class="page-header">
        <h2>DAFTAR <span>LAPANGAN</span></h2>
        <p style="color: #aaa; letter-spacing: 1px;">Pilih arena futsal terbaik untuk pertandingan tim Anda.</p>
    </div>

    <div class="lapangan-grid">
        @forelse($lapangans as $lp)
            <div class="lapangan-card">
                <div class="card-image">
                    <img src="{{ asset('image/' . $lp->foto) }}" alt="Foto {{ $lp->nama_lapangan }}">
                </div>
                
                <div class="card-details">
                    <h3>{{ $lp->nama_lapangan }}</h3>
                    
                    <div class="price-list">
                        <div class="price-item">
                            <span>07.00 - 15.00</span>
                            <strong>Rp 100.000</strong>
                        </div>
                        <div class="price-item">
                            <span>15.00 - 16.00</span>
                            <strong>Rp 130.000</strong>
                        </div>
                        <div class="price-item">
                            <span>17.00 Sore</span>
                            <strong>Rp 140.000</strong>
                        </div>
                        <div class="price-item" style="border:none;">
                            <span>18.00 - Selesai</span>
                            <strong>Rp 155.000</strong>
                        </div>
                    </div>
                    
                    <!-- Tombol booking tiap lapangan -->
                    <a href="{{ route('booking.create', ['lapangan_id' => $lp->id]) }}" class="btn-booking">
                        Booking Sekarang
                    </a>
                </div>
            </div>
        @empty
            <p style="color: #aaa; text-align: center; grid-column: 1/-1;">Belum ada data lapangan tersedia.</p>
        @endforelse
    </div>
</div>

<footer>
    © {{ date('Y') }} RIZKY FUTSAL. All Rights Reserved.
</footer>

</body>
</html>