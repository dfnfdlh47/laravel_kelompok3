<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Booking Lapangan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --black: #000000;
            --red: #e10600;
            --gold: #d4af37;
            --white: #ffffff;
            --card-bg: rgba(17, 17, 17, 0.9);
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
        }

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
            color: var(--red);
        }

        .container {
            min-height: 100vh;
            padding: 120px 20px 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-box {
            background: var(--card-bg);
            padding: 40px;
            border-radius: 15px;
            width: 100%;
            max-width: 500px;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .form-box h2 {
            margin-bottom: 10px;
        }

        .form-box p {
            margin-bottom: 20px;
            color: var(--gold);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #bbb;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: none;
            background: #222;
            color: white;
        }

        input:focus {
            outline: 2px solid var(--red);
        }

        .btn {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: transparent;
            border: 2px solid var(--red);
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background: var(--red);
            box-shadow: 0 0 15px rgba(225, 6, 0, 0.6);
        }

        @media (max-width: 768px) {
            nav {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<nav>
    <h1>RIZKY FUTSAL</h1>
</nav>

<div class="container">
    <div class="form-box">

        <h2>Booking Lapangan</h2>
        <p>{{ $lapangan->nama_lapangan }}</p>

        <form action="{{ route('booking.store') }}" method="POST">
            @csrf

            <input type="hidden" name="lapangan_id" value="{{ $lapangan->id }}">

            <div class="form-group">
                <label>Nama Pemesan</label>
                <input type="text" name="nama_pemesan" required>
            </div>

            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" required>
            </div>

            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" required>
            </div>

            <div class="form-group">
                <label>Jam Mulai</label>
                <select name="jam_mulai" required>
                    <option value="">-- Pilih Jam --</option>
                    @for($i = 7; $i <= 22; $i++)
                        <option value="{{ sprintf('%02d:00', $i) }}">
                            {{ sprintf('%02d:00', $i) }} WIB
                        </option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label>Durasi (Jam)</label>
                <input type="number" name="durasi" min="1" max="5" value="1" required>
            </div>

            <button type="submit" class="btn">
                Booking Sekarang
            </button>
        </form>

    </div>
</div>

</body>
</html>