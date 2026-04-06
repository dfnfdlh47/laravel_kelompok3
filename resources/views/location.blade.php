@extends('layouts.app')

@section('content')
<style>
    :root {
        --black: #000000;
        --red: #e10600;
        --gold: #d4af37;
        --white: #ffffff;
    }

    .hero-location {
        height: 100vh;
        padding: 0 80px;
        display: flex;
        align-items: center;
        background:
            linear-gradient(rgba(0,0,0,0.85), rgba(0,0,0,0.85)),
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
                <a href="https://www.google.com/maps/search/?api=1&query=Rizky+Futsal+Cirebon" target="_blank" class="btn-maps">
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
@endsection