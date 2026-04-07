@extends('layouts.app')

@section('content')
<style>
    body { background-color: #000; color: white; }
    .waiting-container { 
        max-width: 500px; margin: 150px auto; padding: 40px; 
        background: #111; border-radius: 15px; text-align: center;
        border: 1px solid #333;
    }
    .icon-clock { font-size: 50px; color: #d4af37; margin-bottom: 20px; }
    .btn-home { 
        display: inline-block; margin-top: 25px; padding: 10px 20px; 
        background: #e10600; color: white; text-decoration: none; border-radius: 5px;
    }
</style>

<div class="waiting-container">
    <div class="icon-clock">⏳</div>
    <h2>Pembayaran Terkirim!</h2>
    <p style="color: #bbb;">Bukti pembayaran Anda sedang dicek oleh admin. Mohon tunggu beberapa saat. Invoice akan tersedia setelah dikonfirmasi.</p>
    
    <a href="/" class="btn-home">Kembali ke Beranda</a>
</div>
@endsection