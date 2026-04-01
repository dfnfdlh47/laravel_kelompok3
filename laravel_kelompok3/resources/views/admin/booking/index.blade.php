@extends('admin.layout')

@section('title', 'Data Booking')

@section('content')

<!-- JUDUL + BUTTON -->
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold text-gray-700">Data Booking Futsal</h2>
</div>

<!-- TABEL BOOKING -->
<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full text-sm border-collapse">
    <thead class="bg-red-700 text-white">
        <tr>
            <th class="px-4 py-3 text-center">No</th>
            <th class="px-4 py-3 text-left">Nama Pemesan</th>
            <th class="px-4 py-3 text-left">Lapangan</th>
            <th class="px-4 py-3 text-center">Tanggal</th>
            <th class="px-4 py-3 text-center">Jam</th>
            <th class="px-4 py-3 text-center">Durasi</th>
            <th class="px-4 py-3 text-center">Pembayaran</th>
            <th class="px-4 py-3 text-center">Status</th>
            <th class="px-4 py-3 text-center">Aksi</th>
        </tr>
    </thead>

    <tbody class="text-gray-700">
        <tr class="border-b hover:bg-gray-100">
            <td class="px-4 py-3 text-center">1</td>
            <td class="px-4 py-3">Fauzi</td>
            <td class="px-4 py-3">Lapangan A</td>
            <td class="px-4 py-3 text-center">2026-02-12</td>
            <td class="px-4 py-3 text-center">19.00</td>
            <td class="px-4 py-3 text-center">2 Jam</td>
            <td class="px-4 py-3 text-center">QRIS</td>
            <td class="px-4 py-3 text-center">
                <span class="inline-block px-3 py-1 bg-green-500 text-white rounded-full text-xs">
                    Selesai
                </span>
            </td>
            <td class="px-4 py-3 text-center space-x-1">
                <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs">
                    Konfirmasi
                </button>
                <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">
                    Batal
                </button>
            </td>
        </tr>
    </tbody>

    <tbody class="text-gray-700">
        <tr class="border-b hover:bg-gray-100">
            <td class="px-4 py-3 text-center">1</td>
            <td class="px-4 py-3">Bayu</td>
            <td class="px-4 py-3">Lapangan B</td>
            <td class="px-4 py-3 text-center">2026-02-12</td>
            <td class="px-4 py-3 text-center">21.00</td>
            <td class="px-4 py-3 text-center">1 Jam</td>
            <td class="px-4 py-3 text-center">QRIS</td>
            <td class="px-4 py-3 text-center">
                <span class="inline-block px-3 py-1 bg-yellow-500 text-white rounded-full text-xs">
                    Pending
                </span>
            </td>
            <td class="px-4 py-3 text-center space-x-1">
                <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs">
                    Konfirmasi
                </button>
                <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">
                    Batal
                </button>
            </td>
        </tr>
    </tbody>

        <tbody class="text-gray-700">
        <tr class="border-b hover:bg-gray-100">
            <td class="px-4 py-3 text-center">1</td>
            <td class="px-4 py-3">Cecep</td>
            <td class="px-4 py-3">Lapangan A</td>
            <td class="px-4 py-3 text-center">2026-02-12</td>
            <td class="px-4 py-3 text-center">21.00</td>
            <td class="px-4 py-3 text-center">3 Jam</td>
            <td class="px-4 py-3 text-center">QRIS</td>
            <td class="px-4 py-3 text-center">
                <span class="inline-block px-3 py-1 bg-green-500 text-white rounded-full text-xs">
                    Selesai
                </span>
            </td>
            <td class="px-4 py-3 text-center space-x-1">
                <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs">
                    Konfirmasi
                </button>
                <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">
                    Batal
                </button>
            </td>
        </tr>
    </tbody>
</table>

</div>

@endsection
