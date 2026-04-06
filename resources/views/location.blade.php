@extends('layouts.app')

@section('content')
<style>
    :root {
        --black: #000000;
        --red: #e10600;
        --gold: #d4af37;
        --white: #ffffff;
    }

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
        margin-top: 50px; /* Memberi ruang untuk navbar */
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
        color: #cccccc;
        margin-bottom: 40px;
        letter-spacing: 1px;
    }

    /* WRAPPER MENYAMPING */
    .loc-wrapper {
        display: flex;
        gap: 50px;
        border-top: 1px solid rgba(212, 175, 55, 0.3);
        padding-top: 40px;
        align-items: flex-start;
    }

    .loc-info {
        flex: 1; 
    }

    .loc-map {
        flex: 1.5; 
    }

    .loc-info h3, .loc-map h3 {
        color: var(--gold);
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 20px;
    }

    .loc-info p {
        font-size: 18px;
        font-weight: 500;
        line-height: 1.7;
        margin-bottom: 35px;
        color: var(--white);
    }

    .btn-maps {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 14px 35px;
        border: 2px solid var(--red);
        background: transparent;
        color: var(--white);
        text-decoration: none;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
    }

    .btn-maps:hover {
        background: var(--red);
        box-shadow: 0 0 15px rgba(225, 6, 0, 0.5);
    }

    .map-frame {
        width: 100%;
        height: 350px;
        border: none;
        border-radius: 8px;
        opacity: 0.8;
        transition: 0.4s ease;
    }

    .map-frame:hover {
        opacity: 1;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }

    /* =========================================
       3. RESPONSIVE DESIGN (MOBILE / TABLET)
    ========================================= */
    @media (max-width: 992px) {
        .custom-navbar {
            padding: 20px 30px;
            flex-direction: column;
            gap: 15px;
        }
        .custom-navbar .nav-links {
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }
        .loc-wrapper { 
            flex-direction: column; 
        }
        .hero-location { 
            padding: 0 30px; 
            height: auto; 
            padding-top: 150px; 
            padding-bottom: 60px; 
        }
        .hero-location h2 { font-size: 35px; }
    }
</style>

<nav class="custom-navbar">
    <a href="#" class="navbar-brand">RIZKY FUTSAL</a>
    <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="#">Jam Buka</a></li>
        <li><a href="#">Lapangan</a></li>
        <li><a href="#">Location</a></li>
        <li><a href="#">Logout</a></li>
    </ul>
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
                <a href="https://maps.google.com/?q=Jl.+Pangeran+Drajat+No.38,+Jagasatru,+Cirebon" target="_blank" class="btn-maps">
                    📍 Buka di Google Maps
                </a>
            </div>

            <div class="loc-map">
                <h3>Google Maps Preview</h3>
                <iframe 
                    class="map-frame"
                    src="https://maps.google.com/maps?q=-6.7320,108.5523&hl=id&z=15&output=embed" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection