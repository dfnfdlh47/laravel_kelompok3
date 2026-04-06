<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body { font-family: sans-serif; color: #333; }
        .header { text-align: center; border-bottom: 2px solid #e10600; padding-bottom: 20px; margin-bottom: 20px; }
        .header h1 { margin: 0; color: #e10600; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f4f4f4; }
        .total { text-align: right; font-weight: bold; font-size: 18px; margin-top: 20px; color: #d4af37;}
        .status { text-align: center; color: green; font-weight: bold; margin-top: 30px; font-size: 24px; border: 2px dashed green; padding: 10px;}
    </style>
</head>
<body>
    <div class="header">
        <h1>RIZKY FUTSAL</h1>
        <p>Invoice Booking Lapangan</p>
    </div>

    <p><strong>Order ID:</strong> #RF-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</p>
    <p><strong>Nama:</strong> {{ $booking->user->name }}</p>
    
    <table>
        <tr>
            <th>Deskripsi</th>
            <th>Detail</th>
        </tr>
        <tr>
            <td>Tanggal Main</td>
            <td>{{ $booking->tanggal }}</td>
        </tr>
        <tr>
            <td>Jam Mulai</td>
            <td>{{ $booking->jam_mulai }} WIB</td>
        </tr>
        <tr>
            <td>Durasi</td>
            <td>{{ $booking->durasi }} Jam</td>
        </tr>
    </table>

    <div class="total">
        Total Pembayaran: Rp {{ number_format($booking->total_harga, 0, ',', '.') }}
    </div>

    <div class="status">
        LUNAS
    </div>
    
    <p style="text-align: center; margin-top: 50px; font-size: 12px; color: #888;">
        Tunjukkan invoice ini ke petugas lapangan sebagai bukti booking.
    </p>
</body>
</html>