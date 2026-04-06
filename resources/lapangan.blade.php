<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lapangan - Rizky Futsal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white"> <nav style="padding: 20px; display: flex; justify-content: space-between;">
        <h2 style="color: red;">RIZKY FUTSAL</h2>
        <div>
            <a href="{{ url('/home') }}" style="color: white; margin-right: 15px;">Home</a>
            <a href="{{ url('/lapangan') }}" style="color: white;">Lapangan</a>
        </div>
    </nav>

    <div style="padding: 50px;">
        <h1 style="font-size: 2rem; margin-bottom: 20px;">Daftar Lapangan Kami</h1>

        <div style="display: flex; gap: 20px; flex-wrap: wrap;">
            @foreach ($data_lapangan as $lapangan)
                <div style="border: 1px solid #333; padding: 20px; border-radius: 8px; width: 300px; background-color: #1a1a1a;">
                    <h3>{{ $lapangan->nama_lapangan }}</h3> 
                    <p>Harga: Rp {{ number_format($lapangan->harga, 0, ',', '.') }} / jam</p>
                    <p>Jenis: {{ $lapangan->jenis_lapangan }}</p>
                    
                    <button style="margin-top: 15px; padding: 10px; background-color: red; color: white; border: none; cursor: pointer;">
                        Booking Lapangan Ini
                    </button>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>