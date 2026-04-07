@extends('layouts.app')

@section('content')
<style>
    /* 1. Reset Global & Memaksa Latar Belakang Hitam Pekat */
    /* Kita menimpa style dari layouts.app agar navbar putih hilang */
    html, body, #app, .main-content, main {
        background-color: #000000 !important;
        background: #000000 !important;
        color: white;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
    }

    /* 2. Menghilangkan Navbar Asli (jika ada di layouts.app) */
    nav, .navbar, header {
        display: none !important;
    }

    /* 3. Membuat Header "RIZKY FUTSAL" Merah di Pojok Atas */
    .fake-nav {
        position: fixed;
        top: 0;
        width: 100%;
        padding: 24px 80px;
        display: flex;
        justify-content: flex-start; /* Rata kiri */
        align-items: center;
        /* Efek blur transparan di atas hitam */
        background: linear-gradient(to bottom, rgba(0,0,0,0.9), rgba(0,0,0,0));
        backdrop-filter: blur(8px);
        z-index: 1000;
    }

    .fake-nav h1 {
        color: #e10600; /* Warna merah khas */
        font-weight: 700;
        font-size: 24px;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* 4. Menyesuaikan Posisi & Warna Kotak Konfirmasi */
    .confirm-container { 
        width: 100%;
        max-width: 500px; 
        margin: 120px auto 50px; /* Jarak 120px dari atas agar tidak tertutup header */
        padding: 40px; 
        background-color: rgba(17, 17, 17, 0.9); /* Hitam sedikit transparan */
        border-radius: 15px; 
        border: 1px solid rgba(255,255,255,0.1); /* Border tipis gelap */
        box-shadow: 0 10px 40px rgba(0,0,0,0.8);
        text-align: center; 
    }

    .confirm-container h2 {
        color: #fff;
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 25px;
        text-align: left; /* Rata kiri */
    }

    /* 5. Kotak Instruksi Pembayaran */
    .instruction-box { 
        background: #222; /* Warna input/kotak gelap */
        padding: 20px; 
        border-radius: 10px; 
        margin: 20px 0; 
        border-left: 5px solid #e10600; /* Garis merah di samping kiri */
        text-align: left; 
    }

    .instruction-box p {
        color: #bbb;
        font-size: 14px;
        margin: 0 0 10px 0;
    }

    /* Gaya untuk Info Rekening */
    .bank-info-field {
        color: #d4af37; /* Warna Gold */
        font-size: 20px;
        font-weight: bold;
        margin: 10px 0;
    }

    /* Gaya untuk Menampilkan Total (Rata Kiri, Warna Gold) */
    .total-display-section {
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid #333;
        text-align: left;
    }

    .total-display-section p {
        color: #888;
        font-size: 13px;
        margin-bottom: 5px;
    }

    .price-tag-gold { 
        font-size: 28px; 
        font-weight: bold; 
        color: #d4af37; /* Gold */
        margin: 0;
    }

    /* 6. Bagian Upload File */
    .upload-section { 
        margin-top: 30px; 
        text-align: left; 
    }

    .upload-section label {
        display: block;
        font-size: 13px; 
        color: #888;
        margin-bottom: 10px;
    }

    input[type="file"] { 
        background: #222; /* Gelap */
        width: 100%; 
        padding: 12px; 
        border-radius: 8px; 
        color: white; 
        border: 1px solid #333;
        font-size: 13px;
        cursor: pointer;
    }

    /* 7. Tombol Konfirmasi (Outline Merah, Solid saat Hover) */
    .btn-pay {
        display: block;
        width: 100%; 
        padding: 15px; 
        background-color: transparent; 
        border: 2px solid #e10600; /* Merah */
        color: white; 
        border-radius: 8px; 
        font-weight: bold; 
        font-size: 15px;
        cursor: pointer; 
        transition: 0.3s;
        margin-top: 25px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-pay:hover {
        background-color: #e10600; /* Merah Solid */
        box-shadow: 0 0 20px rgba(225, 6, 0, 0.5);
    }

    @media (max-width: 768px) {
        .fake-nav { padding: 20px; }
    }
</style>

<div class="fake-nav">
    <h1>RIZKY FUTSAL</h1>
</div>

<div class="confirm-container">
    <h2>Selesaikan Pembayaran</h2>
    
    <div class="instruction-box">
        {{-- Logika untuk menampilkan No Rek atau QRIS --}}
        @if($booking->metode_pembayaran == 'Transfer Bank Manual')
            <p>Silahkan transfer ke rekening berikut:</p>
            <div class="bank-info-field">BCA: 123-456-7890</div>
            <p>Atas Nama: <strong>RIZKY FUTSAL</strong></p>
        @else
            {{-- Bagian QRIS (sesuaikan logika data jika perlu) --}}
            <p>Silahkan Scan Kode QRIS ini:</p>
            <img src="{{ asset('img/qris-dummy.png') }}" alt="QRIS" style="width: 200px; display: block; margin: 15px auto; border: 5px solid white; border-radius: 10px;">
        @endif
        
        {{-- Bagian Total yang diletakkan rata kiri, warna gold --}}
        <div class="total-display-section">
            <p>Total yang harus dibayar:</p>
            <h3 class="price-tag-gold">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</h3>
        </div>
    </div>

    {{-- Form Upload Bukti --}}
    <form action="{{ route('pay', $booking->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="upload-section">
            <label>Upload Bukti Transfer (JPG/PNG)</label>
            <input type="file" name="bukti_pembayaran" required>
        </div>

        <button type="submit" class="btn-pay">Konfirmasi & Kirim</button>
    </form>
</div>
@endsection