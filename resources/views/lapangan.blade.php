<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lapangan - Rizky Futsal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-900 text-white font-sans">

    <!-- Navbar -->
    <nav class="flex justify-between items-center px-10 py-5 bg-gray-800 shadow-md">
        <h2 class="text-red-500 font-bold text-xl tracking-wide">RIZKY FUTSAL</h2>
        <div class="space-x-6">
            <a href="{{ url('/home') }}" class="hover:text-red-400 transition">Home</a>
            <a href="{{ url('/lapangan') }}" class="hover:text-red-400 transition">Lapangan</a>
        </div>
    </nav>

    <!-- Content -->
    <div class="px-10 py-12">
        <h1 class="text-3xl font-bold mb-8">Daftar Lapangan Kami</h1>

        <!-- Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse ($data_lapangan as $lapangan)
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 hover:scale-105 transition transform duration-300">

                    <h3 class="text-xl font-semibold mb-2 text-red-400">
                        {{ $lapangan->nama_lapangan }}
                    </h3>

                    <p class="text-gray-300 mb-1">
                        💰 Rp {{ number_format($lapangan->harga, 0, ',', '.') }} / jam
                    </p>

                    <p class="text-gray-400 mb-4">
                        ⚽ {{ $lapangan->jenis_lapangan }}
                    </p>

                    <button class="w-full bg-red-500 hover:bg-red-600 transition py-2 rounded-lg font-semibold">
                        Booking Sekarang
                    </button>

                </div>
            @empty
                <p class="text-gray-400">Belum ada data lapangan.</p>
            @endforelse

        </div>
    </div>

</body>
</html>