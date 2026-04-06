<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Booking Lapangan - RIZKY FUTSAL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root { 
            --black: #000000; 
            --red: #e10600; 
            --gold: #d4af37; 
            --white: #ffffff; 
        }
        
        body { 
            background-color: var(--black); 
            color: var(--white); 
            font-family: 'Poppins', sans-serif; 
            margin: 0; 
            padding: 0; 
        }
        
        .container { 
            max-width: 600px; 
            margin: 60px auto; 
            padding: 40px; 
            background: rgba(255,255,255,0.05); 
            border: 1px solid var(--gold); 
            border-radius: 12px; 
        }
        
        h2 { 
            text-align: center; 
            color: var(--gold); 
            margin-bottom: 30px; 
        }
        
        .form-group { 
            margin-bottom: 20px; 
        }
        
        label { 
            display: block; 
            margin-bottom: 5px; 
        }
        
        input, select { 
            width: 100%; 
            padding: 12px; 
            background: #111; 
            border: 1px solid #333; 
            color: white; 
            border-radius: 5px; 
        }
        
        input:read-only { 
            background: #222; 
        }
        
        .btn { 
            width: 100%; 
            padding: 14px; 
            background: transparent; 
            border: 2px solid var(--red); 
            color: white; 
            font-weight: bold; 
            cursor: pointer; 
            margin-top: 20px; 
        }
        
        .btn:hover { 
            background: linear-gradient(135deg, var(--red), var(--gold));
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Booking Lapangan</h2>
        
        <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            
            <!-- AUTO DARI USER LOGIN -->
            <div class="form-group">
                <label>Nama Pemesan</label>
                <input type="text" value="{{ Auth::user()->name }}" readonly>
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="text" value="{{ Auth::user()->email }}" readonly>
            </div>
            
            <!-- INPUT WAJIB -->
            <div class="form-group">
                <label>No. HP</label>
                <input type="text" name="no_hp" required>
            </div>
            
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" required min="{{ date('Y-m-d') }}">
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
            
            <!-- HIDDEN (WAJIB) -->
            <input type="hidden" name="lapangan_id" value="{{ $lapangan->id }}">
            <input type="hidden" name="total_harga" value="130000">
            
            <button type="submit" class="btn">Booking Sekarang</button>
        </form>
    </div>
</body>
</html>