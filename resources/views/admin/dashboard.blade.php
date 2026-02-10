@extends('admin.layout')


@section('content')
<h2 class="text-3xl font-bold mb-6">Dashboard</h2>


<div class="grid grid-cols-3 gap-6">
    <div class="bg-red-600 text-white p-6 rounded-xl shadow">
        <h3>Total Booking</h3>
        <p class="text-4xl">{{ \App\Models\Booking::count() }}</p>
    </div>
</div>
@endsection