@extends('admin.layout')

@section('title', 'Data Booking')

@section('content')

<!-- JUDUL + BUTTON -->
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold text-gray-700">Data Booking Futsal</h2>
</div>

<!-- TABEL BOOKING -->
<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-red-700 text-white">
            <tr>
                <th class="p-3">No</th>
                <th class="p-3">Nama Pemesan</th>
                <th class="p-3">Lapangan</th>
                <th class="p-3">Tanggal</th>
                <th class="p-3">Jam</th>
                <th class="p-3">Durasi</th>
                <th class="p-3">Pembayaran</th>
                <th class="p-3">Status</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>

        <tbody class="text-gray-700">

            <tr class="border-b hover:bg-gray-100">
                <td class="p-3 text-center">1</td>
                <td class="p-3">Fauzi</td>
                <td class="p-3">Lapangan A</td>
                <td class="p-3">2026-02-12</td>
                <td class="p-3">19.00</td>
                <td class="p-3">2 Jam</td>
                <td class="p-3">QRIS</td>
                <td class="p-3">
                    <span class="px-2 py-1 bg-yellow-500 text-white rounded text-xs">
                        Pending
                    </span>
                </td>
                <td class="p-3 space-x-1">
                    <button class="bg-green-600 text-white px-2 py-1 rounded text-xs">
                        Konfirmasi
                    </button>
                    <button class="bg-red-600 text-white px-2 py-1 rounded text-xs">
                        Batal
                    </button>
                </td>
            </tr>

            <tr class="border-b hover:bg-gray-100">
                <td class="p-3 text-center">2</td>
                <td class="p-3">Bayu</td>
                <td class="p-3">Lapangan B</td>
                <td class="p-3">2026-02-12</td>
                <td class="p-3">20.00</td>
                <td class="p-3">1 Jam</td>
                <td class="p-3">Cash</td>
                <td class="p-3">
                    <span class="px-2 py-1 bg-green-600 text-white rounded text-xs">
                        Selesai
                    </span>
                </td>
                <td class="p-3">
                    <span class="text-gray-400 text-xs">-</span>
                </td>
            </tr>

            <tr class="hover:bg-gray-100">
                <td class="p-3 text-center">3</td>
                <td class="p-3">Dimas</td>
                <td class="p-3">Lapangan A</td>
                <td class="p-3">2026-02-13</td>
                <td class="p-3">18.00</td>
                <td class="p-3">2 Jam</td>
                <td class="p-3">Transfer</td>
                <td class="p-3">
                    <span class="px-2 py-1 bg-red-600 text-white rounded text-xs">
                        Dibatalkan
                    </span>
                </td>
                <td class="p-3">
                    <span class="text-gray-400 text-xs">-</span>
                </td>
            </tr>

        </tbody>
    </table>
</div>

@endsection
