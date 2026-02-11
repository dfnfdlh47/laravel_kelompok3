@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')

<!-- CARD STATISTIK -->
<div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-8">

    <div class="bg-red-600 text-white p-5 rounded shadow">
        <div class="text-sm">Booking Hari Ini</div>
        <div class="text-3xl font-bold">5</div>
    </div>

    <div class="bg-gray-800 text-white p-5 rounded shadow">
        <div class="text-sm">Jumlah Lapangan</div>
        <div class="text-3xl font-bold">2</div>
    </div>

    <div class="bg-red-700 text-white p-5 rounded shadow">
        <div class="text-sm">Total User</div>
        <div class="text-3xl font-bold">18</div>
    </div>

    <div class="bg-yellow-600 text-white p-5 rounded shadow">
        <div class="text-sm">Total Pendapatan</div>
        <div class="text-3xl font-bold">Rp 1.250K</div>
    </div>

    <div class="bg-red-800 text-white p-5 rounded shadow">
        <div class="text-sm">Akan Main Hari Ini</div>
        <div class="text-3xl font-bold">3</div>
    </div>

</div>

<!-- TRANSAKSI TERBARU -->
<div class="bg-white rounded shadow">
    <div class="px-6 py-4 border-b">
        <h2 class="font-semibold text-lg text-gray-700">Transaksi Terbaru</h2>
    </div>

    <div class="p-4 overflow-x-auto">
<table class="w-full text-sm border-collapse">
    <thead class="bg-red-700 text-white">
        <tr>
            <th class="px-4 py-3 text-center">No</th>
            <th class="px-4 py-3 text-left">Nama Pemesan</th>
            <th class="px-4 py-3 text-left">Lapangan</th>
            <th class="px-4 py-3 text-center">Tanggal</th>
            <th class="px-4 py-3 text-center">Jam</th>
            <th class="px-4 py-3 text-center">Durasi</th>
            <th class="px-4 py-3 text-center">Status</th>
        </tr>
    </thead>

    <tbody>
        <tr class="border-b hover:bg-gray-100">
            <td class="px-4 py-3 text-center">1</td>
            <td class="px-4 py-3">Fauzi</td>
            <td class="px-4 py-3">Lapangan A</td>
            <td class="px-4 py-3 text-center">2026-02-11</td>
            <td class="px-4 py-3 text-center">19.00</td>
            <td class="px-4 py-3 text-center">2 Jam</td>
            <td class="px-4 py-3 text-center">
                <span class="inline-block px-3 py-1 bg-green-600 text-white rounded-full text-xs">
                    Selesai
                </span>
            </td>
        </tr>
    </tbody>

        <tbody>
        <tr class="border-b hover:bg-gray-100">
            <td class="px-4 py-3 text-center">1</td>
            <td class="px-4 py-3">Bayu</td>
            <td class="px-4 py-3">Lapangan B</td>
            <td class="px-4 py-3 text-center">2026-02-11</td>
            <td class="px-4 py-3 text-center">21.00</td>
            <td class="px-4 py-3 text-center">1 Jam</td>
            <td class="px-4 py-3 text-center">
                <span class="inline-block px-3 py-1 bg-yellow-600 text-white rounded-full text-xs">
                    Pending
                </span>
            </td>
        </tr>
    </tbody>

            <tbody>
        <tr class="border-b hover:bg-gray-100">
            <td class="px-4 py-3 text-center">1</td>
            <td class="px-4 py-3">Cecep</td>
            <td class="px-4 py-3">Lapangan A</td>
            <td class="px-4 py-3 text-center">2026-02-11</td>
            <td class="px-4 py-3 text-center">21.00</td>
            <td class="px-4 py-3 text-center">3 Jam</td>
            <td class="px-4 py-3 text-center">
                <span class="inline-block px-3 py-1 bg-green-600 text-white rounded-full text-xs">
                    Selesai
                </span>
            </td>
        </tr>
    </tbody>
</table>
    </div>
</div>

@endsection