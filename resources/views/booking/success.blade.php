@extends('layouts.app')

@section('content')
<style>
    body { background-color: #000; color: white; font-family: 'Poppins', sans-serif; }
    .fake-nav { position: fixed; top: 0; width: 100%; padding: 24px 80px; }
    .fake-nav h1 { color: #e10600; font-weight: 700; font-size: 24px; text-transform: uppercase; }
    
    .success-container { 
        max-width: 550px; margin: 150px auto; padding: 40px; 
        background-color: #111; border-radius: 15px; text-align: center;
        border: 1px solid #333;
    }
    .status-badge {
        display: inline-block; padding: 8px 20px; background: #d4af37;
        color: black; border-radius: 50px; font-weight: bold; margin-bottom: 20px;
    }
    .btn-back {
        display: inline-block; margin-top: 30px; padding: 12px 30px;
        border: 2px solid #e10600; color: white; text-decoration: none;
        border-radius: 8px; transition: 0.3s;
    }
    .btn-back:hover { background: #e10600; }
</style>

<div class="fake-nav"><h1>RIZKY FUTSAL</h1></div>

<div class="success-container">
    <div class="status-badge">MENUNGGU KONFIRMASI</div>
    <h2 style="font-size: 24px; margin-bottom: 15px;">Bukti Pembayaran Terkirim!</h2>
    <p style="color: #bbb; line-height: 1.6;">
        Terima kasih, <strong>{{ $booking->nama_pemesan }}</strong>. <br>
        Pembayaran Anda sedang kami verifikasi. Silahkan cek secara berkala. 
        Invoice akan tersedia setelah status dikonfirmasi oleh Admin.
    </p>
    
    <a href="/" class="btn-back">KEMBALI KE BERANDA</a>
</div>
@endsection