@extends('admin.layout')


@section('content')
<h2 class="text-2xl font-bold mb-4">Data Booking</h2>
<a href="{{ route('admin.booking.create') }}" class="bg-red-600 text-white px-4 py-2 rounded">Tambah</a>


<table class="w-full mt-4 bg-white text-black">
    <tr class="bg-black text-white">
        <th>Nama</th><th>Tanggal</th><th>Jam</th><th>Status</th><th>Aksi</th>
    </tr>
@foreach($bookings as $b)
    <tr>
        <td>{{ $b->nama_pemesan }}</td>
        <td>{{ $b->tanggal }}</td>
        <td>{{ $b->jam_mulai }} - {{ $b->jam_selesai }}</td>
        <td>{{ $b->status }}</td>
        <td class="flex gap-2">
        <a href="{{ route('admin.booking.edit',$b->id) }}">Edit</a>
            <form method="POST" action="{{ route('admin.booking.destroy',$b->id) }}">
             @csrf @method('DELETE')
            <button>Hapus</button>
             </form>
        </td>
        </tr>
@endforeach
</table>
@endsection