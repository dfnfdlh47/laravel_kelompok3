@section('content')

<style>
    .fade-in {
        animation: fadeIn 0.8s ease-in-out;
    }

    .slide-up {
        animation: slideUp 0.7s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {    
        from {
            transform: translateY(40px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .glass {
        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(10px);
    }

    .btn-anim {
        transition: all 0.3s ease;
    }

    .btn-anim:hover {
        transform: scale(1.1);
    }
</style>

<div class="fade-in">

    <!-- JUDUL -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-white tracking-wide">
            Data Booking Futsal
        </h2>
    </div>

    <!-- TABEL -->
    <div class="glass rounded-xl shadow-lg overflow-x-auto slide-up border border-red-600">

        <table class="w-full text-sm border-collapse text-white">

            <thead class="bg-red-700">
                <tr>
                    <th class="px-4 py-3 text-center">No</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Lapangan</th>
                    <th class="px-4 py-3 text-center">Tanggal</th>
                    <th class="px-4 py-3 text-center">Jam</th>
                    <th class="px-4 py-3 text-center">Durasi</th>
                    <th class="px-4 py-3 text-center">Pembayaran</th>
                    <th class="px-4 py-3 text-center">Status</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <!-- ROW 1 -->
                <tr class="border-b border-gray-700 hover:bg-red-900/20 transition">
                    <td class="px-4 py-3 text-center">1</td>
                    <td class="px-4 py-3">Fauzi</td>
                    <td class="px-4 py-3">Lapangan A</td>
                    <td class="px-4 py-3 text-center">2026-02-12</td>
                    <td class="px-4 py-3 text-center">19.00</td>
                    <td class="px-4 py-3 text-center">2 Jam</td>
                    <td class="px-4 py-3 text-center">QRIS</td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-3 py-1 bg-yellow-500 rounded-full text-xs">
                            Pending
                        </span>
                    </td>
                    <td class="px-4 py-3 text-center space-x-1">
                        <button class="bg-green-600 px-3 py-1 rounded text-xs btn-anim">
                            ✔
                        </button>
                        <button class="bg-red-600 px-3 py-1 rounded text-xs btn-anim">
                            ✖
                        </button>
                    </td>
                </tr>

                <!-- ROW 2 -->
                <tr class="border-b border-gray-700 hover:bg-red-900/20 transition">
                    <td class="px-4 py-3 text-center">2</td>
                    <td class="px-4 py-3">Bayu</td>
                    <td class="px-4 py-3">Lapangan A</td>
                    <td class="px-4 py-3 text-center">2026-02-12</td>
                    <td class="px-4 py-3 text-center">21.00</td>
                    <td class="px-4 py-3 text-center">1 Jam</td>
                    <td class="px-4 py-3 text-center">QRIS</td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-3 py-1 bg-green-500 rounded-full text-xs">
                            Selesai
                        </span>
                    </td>
                    <td class="px-4 py-3 text-center space-x-1">
                        <button class="bg-green-600 px-3 py-1 rounded text-xs btn-anim">
                            ✔
                        </button>
                        <button class="bg-red-600 px-3 py-1 rounded text-xs btn-anim">
                            ✖
                        </button>
                    </td>
                </tr>

            </tbody>

        </table>
    </div>

</div>

@endsection