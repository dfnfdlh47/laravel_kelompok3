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

        nav .menu {
            display: flex;
            align-items: center;
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

        /* ================= HERO / MAIN CONTENT ================= */
        /* =========================================
       1. NAVBAR STYLING (SESUAI FOTO)
    ========================================= */
    .custom-navbar {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1030;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 30px 80px;
        background-color: transparent;
    }

    .custom-navbar .navbar-brand {
        color: var(--red);
        font-size: 22px;
        font-weight: 800;
        text-transform: uppercase;
        text-decoration: none;
        letter-spacing: 2px;
    }

    .custom-navbar .nav-links {
        display: flex;
        list-style: none;
        gap: 35px;
        margin: 0;
        padding: 0;
    }

    .custom-navbar .nav-links li a {
        color: var(--white);
        text-decoration: none;
        font-size: 16px;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .custom-navbar .nav-links li a:hover {
        color: var(--gold); /* Efek hover menjadi warna emas */
    }

    /* Menyembunyikan navbar bawaan layouts.app jika ada konflik */
    header, .navbar-light, .bg-white {
        display: none !important; 
    }


    /* =========================================
       2. HERO SECTION & LOCATION STYLING
    ========================================= */
    .hero-location {
            height: 100vh;
            padding: 0 80px;
            display: flex;
            align-items: center;
            background: 
                linear-gradient(rgba(15, 15, 15, 0.9), rgba(15, 15, 15, 0.8)), /* Gradien gelap agar navbar & teks kontras */
                url('https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=2000') 
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

    /* WRAPPER MENYAMPING */
    .loc-wrapper {
        display: flex;
        gap: 50px;
        border-top: 1px solid rgba(212, 175, 55, 0.3);
        padding-top: 30px;
        align-items: flex-start;
    }

    .loc-info {
        flex: 1; /* Bagian teks Alamat & Tombol */
    }

    .loc-map {
        flex: 1.5; /* Bagian Google Maps lebih lebar */
    }

    .loc-info h3 {
        color: var(--gold);
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 15px;
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
        color: var(--white);
        box-shadow: 0 0 20px rgba(225, 6, 0, 0.4);
    }

    .map-frame {
        width: 100%;
        height: 300px;
        border: 1px solid var(--gold);
        border-radius: 4px;
        filter: grayscale(0.5) contrast(1.2) invert(0.9); /* Efek peta gelap biar senada */
        transition: 0.5s;
    }

    .map-frame:hover {
        filter: grayscale(0);
    }

    @media (max-width: 992px) {
        .loc-wrapper { flex-direction: column; }
        .hero-location { padding: 0 30px; height: auto; padding-top: 120px; padding-bottom: 50px; }
        .hero-location h2 { font-size: 35px; }
    }
</style>

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
                    <a href="https://www.google.com/maps/search/?api=1&query=Rizky+Futsal+Jl.+Pangeran+Drajat+No.38+Cirebon" target="_blank" class="btn-maps">
                        📍 Buka di Google Maps
                    </a>
            </div>

            <div class="loc-map">
                <h3>Google Maps Preview</h3>
                <iframe 
                    class="map-frame"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.333333333333!2d108.55555555555556!3d-6.722222222222222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee265106195e3%3A0x123456789abcdef!2sJl.%20Pangeran%20Drajat%20No.38%2C%20Jagasatru%2C%20Kec.%20Pekalipan%2C%20Kota%20Cirebon%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
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


