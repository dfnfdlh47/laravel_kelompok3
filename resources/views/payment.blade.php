@extends('layouts.app')

@section('content')
<style>
    /* 1. MENGHILANGKAN NAVBAR BAWAAN */
    nav, .navbar, header {
        display: none !important;
    }

    :root { 
        --gold: #d4af37; 
        --red: #e10600; 
        --pure-black: #000000; 
        --card-bg: rgba(17, 17, 17, 0.9); /* Samakan dengan create.blade */
    }

    /* 2. BACKGROUND HITAM PEKAT */
    html, body, #app, .main-content, main, .py-4 {
        background-color: var(--pure-black) !important;
        background: var(--pure-black) !important;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        color: #fff;
        border: none !important;
    }

    /* 3. NAVBAR RIZKY FUTSAL (SAMA DENGAN CREATE) */
    .fake-nav {
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

    .fake-nav h1 {
        color: var(--red);
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 24px;
        margin: 0;
    }

    /* 4. CONTAINER DISESUAIKAN LEBARNYA (MAX-WIDTH 500PX) */
    .payment-container { 
        width: 100%;
        max-width: 500px; /* Lebar sama dengan form-box di create.blade */
        margin: 120px auto 50px; /* Jarak atas 120px untuk mengakomodasi nav */
        padding: 40px; 
        background-color: var(--card-bg); 
        border-radius: 15px;
        font-family: 'Poppins', sans-serif;
        border: 1px solid rgba(255,255,255,0.1); 
        box-shadow: 0 10px 40px rgba(0,0,0,0.8);
    }

    .header-title { 
        color: #fff; 
        text-align: left; 
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 5px;
        letter-spacing: 0.5px;
    }

    .sub-title-field {
        color: var(--gold);
        font-size: 14px;
        margin-bottom: 25px;
        font-weight: 500;
    }

    .booking-detail { 
        background-color: #222; /* Samakan dengan warna input di create */
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        border: 1px solid #333;
        font-size: 14px;
        line-height: 1.8;
    }

    .price-tag { 
        font-size: 36px; 
        font-weight: bold; 
        color: var(--gold); 
        text-align: center;
        margin: 15px 0;
    }

    .method-card { 
        display: flex; 
        align-items: center; 
        padding: 15px; 
        background-color: #222; 
        border: 1px solid #333; 
        border-radius: 8px; 
        margin-bottom: 12px; 
        cursor: pointer; 
        transition: 0.2s ease-in-out; 
    }

    .method-card:hover { 
        border-color: var(--gold); 
    }

    .method-card input { 
        margin-right: 15px; 
        accent-color: var(--gold); 
        transform: scale(1.2);
    }

    .btn-confirm { 
        width: 100%; 
        padding: 14px; 
        background-color: transparent; 
        border: 2px solid var(--red); 
        color: white; 
        border-radius: 8px; 
        font-weight: bold; 
        font-size: 15px;
        cursor: pointer; 
        transition: 0.3s;
        margin-top: 15px;
        text-transform: uppercase;
    }

    .btn-confirm:hover {
        background-color: var(--red);
        box-shadow: 0 0 20px rgba(225, 6, 0, 0.4);
    }

    hr {
        border: 0;
        border-top: 1px solid #333;
        margin: 20px 0;
    }

    @media (max-width: 768px) {
        .fake-nav { padding: 20px; }
    }
</style>

<div class="fake-nav">
    <h1>RIZKY FUTSAL</h1>
</div>

<div class="payment-container">
    <h2 class="header-title">Rincian Pembayaran</h2>
    <div class="sub-title-field">{{ $booking->lapangan->nama_lapangan }}</div>
    
    <div class="booking-detail">
        <div style="color: #666; font-size: 12px; text-transform: uppercase; margin-bottom: 5px;">Data Pesanan</div>
        <span style="color: #bbb;">Tanggal:</span> <strong>{{ \Carbon\Carbon::parse($booking->tanggal)->format('d/m/Y') }}</strong><br>
        <span style="color: #bbb;">Jam Mulai:</span> <strong>{{ substr($booking->jam_mulai, 0, 5) }} WIB</strong><br>
        <span style="color: #bbb;">Durasi:</span> <strong>{{ $booking->durasi }} Jam</strong>
    </div>

    <div style="text-align: center; color: #888; font-size: 13px;">Total Pembayaran:</div>
    <div class="price-tag">
        Rp {{ number_format($booking->total_harga, 0, ',', '.') }}
    </div>

    <hr>

    <div style="color: var(--gold); font-size: 14px; margin-bottom: 15px; font-weight: 500;">Pilih Metode Pembayaran</div>

    <form action="{{ route('payment.update', $booking->id) }}" method="POST">
        @csrf
        

        <label class="method-card">
            <input type="radio" name="metode_pembayaran" value="QRIS">
            <div>
                <div style="font-weight: 600; font-size: 14px;">QRIS / E-Wallet</div>
                <small style="color: #777;">Dana, OVO, GoPay, LinkAja</small>
            </div>
        </label>

        <button type="submit" class="btn-confirm">Konfirmasi & Lanjut</button>
    </form>
</div>
@endsection