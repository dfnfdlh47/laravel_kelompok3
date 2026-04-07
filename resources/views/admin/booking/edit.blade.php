@extends('layouts.app')

@section('content')
<style>
    /* ================= GLOBAL & THEME VARIABLES ================= */
    :root {
        --black: #000000;
        --red-dark: #b30000;
        --red: #e10600;
        --gold: #d4af37;
        --white: #ffffff;
        --card-bg: #0b0b0b;
        --input-bg: #1a1a1a;
    }

    body {
        background-color: var(--black) !important;
        font-family: 'Poppins', sans-serif;
        color: var(--white);
    }

    /* ================= NAVBAR (RIZKY FUTSAL STYLE) ================= */
    nav {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 24px 80px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: rgba(0, 0, 0, 0.9);
        backdrop-filter: blur(8px);
        z-index: 1000;
        border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    }

    .nav-logo h1 {
        font-size: 22px;
        font-weight: 700;
        color: var(--red);
        margin: 0;
        text-transform: uppercase;
    }

    .nav-logo h1 span { color: var(--white); }

    .nav-menu { display: flex; align-items: center; }

    .nav-menu a, .logout-btn {
        color: var(--white);
        text-decoration: none;
        margin-left: 28px;
        font-size: 14px;
        transition: 0.3s;
        opacity: 0.8;
        background: none;
        border: none;
        cursor: pointer;
    }

    .nav-menu a:hover, .logout-btn:hover { color: var(--red); opacity: 1; }

    /* ================= FORM CONTAINER ================= */
    .admin-container {
        padding: 120px 80px 60px;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .form-card {
        background: var(--card-bg);
        border: 1px solid rgba(212, 175, 55, 0.2);
        width: 100%;
        max-width: 800px;
        padding: 40px;
        border-radius: 4px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.5);
    }

    .form-header {
        border-left: 4px solid var(--red);
        padding-left: 15px;
        margin-bottom: 30px;
    }

    .form-header h2 {
        font-size: 24px;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* ================= INPUT STYLING ================= */
    .form-group { margin-bottom: 20px; }

    label {
        display: block;
        color: var(--gold);
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 8px;
    }

    .form-control, .form-select {
        width: 100%;
        background: var(--input-bg);
        border: 1px solid #333;
        padding: 12px 15px;
        color: var(--white);
        font-size: 14px;
        border-radius: 2px;
        transition: 0.3s;
    }

    .form-control:focus, .form-select:focus {
        outline: none;
        border-color: var(--red);
        box-shadow: 0 0 10px rgba(225, 6, 0, 0.2);
    }

    .row { display: flex; gap: 20px; margin-bottom: 20px; }
    .col { flex: 1; }

    /* ================= BUTTONS ================= */
    .btn-group {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid rgba(255,255,255,0.05);
    }

    .btn-save {
        background: var(--red);
        color: var(--white);
        border: none;
        padding: 12px 40px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 12px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-save:hover { background: var(--red-dark); transform: translateY(-2px); }

    .btn-back {
        background: transparent;
        color: #666;
        border: 1px solid #333;
        padding: 12px 30px;
        font-weight: 600;
        text-decoration: none;
        font-size: 12px;
        transition: 0.3s;
    }

    .btn-back:hover { color: var(--white); border-color: var(--white); }

    @media (max-width: 768px) {
        nav { padding: 20px 30px; }
        .admin-container { padding: 100px 20px; }
        .row { flex-direction: column; gap: 0; }
        .form-card { padding: 25px; }
    }
</style>

{{-- NAVBAR --}}
<nav>
    <div class="nav-logo">
        <a href="{{ route('admin.dashboard') }}" style="text-decoration: none;">
            <h1>RIZKY <span>FUTSAL</span></h1>
        </a>
    </div>
    <div class="nav-menu">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.booking.index') }}" class="active">Manage Booking</a>
        <a href="#">Arena</a>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</nav>

<div class="admin-container">
    <div class="form-card">
        <div class="form-header">
            <h2>Edit <span style="color: var(--red)">Booking</span> #{{ $booking->id }}</h2>
            <p style="color: #555; font-size: 12px; margin: 0;">Pastikan data jadwal tidak bentrok sebelum melakukan update.</p>
        </div>

        <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Akun User</label>
                        <select name="user_id" class="form-select" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Pilih Lapangan</label>
                        <select name="lapangan_id" class="form-select" required>
                            @foreach($lapangans as $lapangan)
                                <option value="{{ $lapangan->id }}" {{ $booking->lapangan_id == $lapangan->id ? 'selected' : '' }}>
                                    {{ $lapangan->nama_lapangan }} - Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }}/jam
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Nama Pemesan</label>
                        <input type="text" name="nama_pemesan" class="form-control" value="{{ $booking->nama_pemesan }}" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Nomor WhatsApp (HP)</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ $booking->no_hp }}" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Tanggal Booking</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $booking->tanggal }}" required>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="form-control" value="{{ \Carbon\Carbon::parse($booking->jam_mulai)->format('H:i') }}" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Jam Selesai</label>
                        <input type="time" name="jam_selesai" class="form-control" value="{{ \Carbon\Carbon::parse($booking->jam_selesai)->format('H:i') }}" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Durasi (Jam)</label>
                        <input type="number" name="durasi" class="form-control" value="{{ $booking->durasi }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Total Harga (Rp)</label>
                        <input type="number" name="total_harga" class="form-control" value="{{ $booking->total_harga }}" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Status Pembayaran</label>
                        <select name="status" class="form-select">
                            <option value="Booking" {{ $booking->status == 'Booking' ? 'selected' : '' }}>BOOKING (WAITING)</option>
                            <option value="Lunas" {{ $booking->status == 'Lunas' ? 'selected' : '' }}>LUNAS (PAID)</option>
                            <option value="Batal" {{ $booking->status == 'Batal' ? 'selected' : '' }}>BATAL (CANCELED)</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="btn-group">
                <a href="{{ route('admin.booking.index') }}" class="btn-back">KEMBALI</a>
                <button type="submit" class="btn-save">UPDATE DATA BOOKING</button>
            </div>
        </form>
    </div>
</div>
@endsection