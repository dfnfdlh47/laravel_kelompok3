<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran - RIZKY FUTSAL</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { background-color: #000; color: #fff; font-family: 'Poppins', sans-serif; }
        .container { max-width: 500px; margin: 100px auto; padding: 40px; background: #111; border: 1px solid #e10600; text-align: center; }
        h2 { color: #e10600; }
        .price { font-size: 36px; font-weight: bold; color: #d4af37; margin: 20px 0; }
        .detail { color: #ccc; margin-bottom: 30px; line-height: 1.8; }
        .btn { padding: 14px 40px; background: #e10600; color: white; border: none; font-weight: bold; cursor: pointer; text-decoration: none; display: inline-block;}
    </style>
</head>
<body>
    <div class="container">
        <h2>Rincian Pembayaran</h2>
        <div class="detail">
            Tanggal: {{ \Carbon\Carbon::parse($booking->tanggal)->format('d M Y') }}<br>
            Jam: {{ $booking->jam_mulai }} WIB<br>
            Durasi: {{ $booking->durasi }} Jam
        </div>
        <p>Total yang harus dibayar:</p>
        <div class="price">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</div>
        
        <form action="{{ route('payment.pay', $booking->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn">Konfirmasi Pembayaran</button>
        </form>
    </div>
</body>
</html>