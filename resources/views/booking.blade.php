<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Booking Lapangan - RIZKY FUTSAL</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Mengambil tema yang sama */
        :root { --black: #000000; --red: #e10600; --gold: #d4af37; --white: #ffffff; }
        body { background-color: var(--black); color: var(--white); font-family: 'Poppins', sans-serif; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 80px auto; padding: 40px; background: rgba(255,255,255,0.05); border: 1px solid var(--gold); border-radius: 8px; }
        h2 { text-align: center; color: var(--gold); margin-bottom: 30px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; color: #ccc; }
        input, select { width: 100%; padding: 12px; background: #111; border: 1px solid #333; color: white; border-radius: 4px; box-sizing: border-box; }
        input:read-only { background: #222; color: #888; }
        .btn { display: block; width: 100%; padding: 14px; background: transparent; border: 2px solid var(--red); color: white; font-weight: bold; text-align: center; cursor: pointer; transition: 0.3s; margin-top: 30px; text-decoration: none;}
        .btn:hover { background: var(--red); }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Booking</h2>
        <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Pemesan</label>
                <input type="text" value="{{ Auth::user()->name }}" readonly>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" value="{{ Auth::user()->email }}" readonly>
            </div>
            <div class="form-group">
                <label>No. WhatsApp / Telepon</label>
                <input type="text" name="phone" value="{{ Auth::user()->phone }}" required>
            </div>
            <div class="form-group">
                <label>Tanggal Main</label>
                <input type="date" name="tanggal" required min="{{ date('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label>Jam Mulai</label>
                <select name="jam_mulai" required>
                    <option value="">-- Pilih Jam --</option>
                    @for($i = 7; $i <= 22; $i++)
                        <option value="{{ sprintf('%02d:00', $i) }}">{{ sprintf('%02d:00', $i) }} WIB</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label>Durasi (Jam)</label>
                <input type="number" name="durasi" min="1" max="5" value="1" required>
            </div>
            <button type="submit" class="btn">Lanjut ke Pembayaran</button>
        </form>
    </div>
</body>
</html>