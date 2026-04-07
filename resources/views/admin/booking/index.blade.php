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
        --table-hover: #161616;
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

    /* ================= MAIN WRAPPER ================= */
    .admin-container {
        padding: 120px 80px 60px;
        min-height: 100vh;
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 30px;
        border-left: 5px solid var(--red);
        padding-left: 20px;
    }

    .btn-add {
        background: transparent;
        border: 2px solid var(--gold);
        color: var(--gold);
        padding: 10px 20px;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 12px;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-add:hover {
        background: var(--gold);
        color: var(--black);
    }

    /* ================= TABLE AREA ================= */
    .table-responsive {
        background: var(--card-bg);
        border: 1px solid rgba(255,255,255,0.05);
        border-radius: 4px;
        overflow: hidden;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: rgba(255,255,255,0.02);
        color: var(--gold);
        text-transform: uppercase;
        font-size: 11px;
        letter-spacing: 1px;
        padding: 20px;
        text-align: left;
        border-bottom: 1px solid rgba(212,175,55,0.2);
    }

    td {
        padding: 20px;
        border-bottom: 1px solid rgba(255,255,255,0.03);
        font-size: 14px;
        vertical-align: middle;
    }

    tr:hover td { background: var(--table-hover); }

    /* STATUS BADGES */
    .badge-status {
        padding: 5px 12px;
        border-radius: 2px;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
    }
    .status-lunas { background: rgba(0, 255, 0, 0.1); color: #00ff00; border: 1px solid #00ff00; }
    .status-booking { background: rgba(212, 175, 55, 0.1); color: var(--gold); border: 1px solid var(--gold); }
    .status-batal { background: rgba(225, 6, 0, 0.1); color: var(--red); border: 1px solid var(--red); }

    /* WHATSAPP BUTTON */
    .btn-wa {
        color: #25d366;
        text-decoration: none;
        font-size: 12px;
        display: inline-block;
        margin-top: 5px;
        transition: 0.3s;
    }
    .btn-wa:hover { color: var(--white); text-shadow: 0 0 10px #25d366; }

    /* ACTION BUTTONS */
    .btn-edit { color: var(--gold); text-decoration: none; margin-right: 15px; font-weight: 600; }
    .btn-delete { background: none; border: none; color: var(--red); cursor: pointer; font-weight: 600; padding: 0; }

    /* ================= ALERT ================= */
    .alert-custom {
        background: rgba(0, 255, 0, 0.1);
        border: 1px solid #00ff00;
        color: #00ff00;
        padding: 15px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    @media (max-width: 768px) {
        nav { padding: 20px 30px; }
        .admin-container { padding: 100px 30px; }
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
        <a href="#">Settings</a>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</nav>

<div class="admin-container">
    <div class="header-section">
        <div>
            <h2 style="margin:0;">BOOKING <span style="color: var(--red)">LIST</span></h2>
            <p style="color: #666; font-size: 13px; margin: 0;">Kelola semua data penyewaan lapangan</p>
        </div>
        <a href="{{ route('admin.booking.create') }}" class="btn-add">+ Add Manual Booking</a>
    </div>

    @if(session('success'))
        <div class="alert-custom">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Customer Info</th>
                    <th>Arena</th>
                    <th>Date & Time</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $index => $data)
                <tr>
                    <td style="color: #444; font-weight: bold;">{{ $index + 1 }}</td>
                    <td>
                        <div style="font-weight: 600; color: var(--white);">{{ $data->nama_pemesan }}</div>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $data->no_hp) }}?text=Halo%20{{ $data->nama_pemesan }},%20kami%20dari%20Rizky%20Futsal%20ingin%20mengonfirmasi%20booking%20Anda..." 
                           target="_blank" class="btn-wa">
                           <i class="fab fa-whatsapp"></i> {{ $data->no_hp }}
                        </a>
                    </td>
                    <td style="color: var(--gold);">{{ $data->lapangan->nama_lapangan ?? 'N/A' }}</td>
                    <td>
                        <div style="font-weight: 500;">{{ \Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}</div>
                        <div style="font-size: 12px; color: var(--red);">{{ $data->jam_mulai }} - {{ $data->jam_selesai }} ({{ $data->durasi }} Jam)</div>
                    </td>
                    <td style="font-weight: 700;">Rp {{ number_format($data->total_harga, 0, ',', '.') }}</td>
                    <td>
                        @if($data->status == 'Lunas')
                            <span class="badge-status status-lunas">Paid</span>
                        @elseif($data->status == 'Booking')
                            <span class="badge-status status-booking">Booked</span>
                        @else
                            <span class="badge-status status-batal">Canceled</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <a href="{{ route('admin.booking.edit', $data->id) }}" class="btn-edit">EDIT</a>
                        
                        <form action="{{ route('admin.booking.destroy', $data->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">DELETE</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 100px; color: #444;">
                        No booking data available at the moment.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Font Awesome untuk Icon WhatsApp --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection