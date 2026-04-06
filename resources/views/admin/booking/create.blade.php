@extends('admin.layout')

@section('content')

<div class="max-w-xl mx-auto bg-gray-900 p-6 rounded shadow text-white">
    <h2 class="text-xl font-bold mb-4">Tambah Booking</h2>

    <form action="{{ route('admin.booking.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama_pemesan" class="w-full p-2 bg-gray-800 rounded">
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="w-full p-2 bg-gray-800 rounded">
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="w-full p-2 bg-gray-800 rounded">
        </div>

        <div class="mb-3">
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai" class="w-full p-2 bg-gray-800 rounded">
        </div>

        <div class="mb-3">
            <label>Jam Selesai</label>
            <input type="time" name="jam_selesai" class="w-full p-2 bg-gray-800 rounded">
        </div>

        <button class="bg-red-600 px-4 py-2 rounded mt-3">
            Simpan
        </button>
    </form>
</div>

@endsection