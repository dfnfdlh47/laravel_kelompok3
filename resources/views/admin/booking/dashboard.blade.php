@extends('layouts.app')

@section('content')
<style>
    /* ================= GLOBAL & VARIABLES ================= */
    :root {
        --black: #000000;
        --red-dark: #b30000;
        --red: #e10600;
        --gold: #d4af37;
        --white: #ffffff;
        --dark-grey: #0b0b0b;
        --card-bg: #141414;
    }

    body {
        background-color: var(--black) !important;
        font-family: 'Poppins', sans-serif;
        color: var(--white);
        margin: 0;
        padding: 0;
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
        -webkit-backdrop-filter: blur(8px);
        z-index: 1000;
        border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    }

    .nav-logo h1 {
        font-size: 22px;
        font-weight: 700;
        color: var(--red);
        letter-spacing: 1px;
        margin: 0;
        text-transform: uppercase;
    }

    .nav-logo h1 span {
        color: var(--white);
    }

    .nav-menu {
        display: flex;
        align-items: center;
    }

    .nav-menu a, .logout-btn {
        color: var(--white);
        text-decoration: none;
        margin-left: 28px;
        font-size: 14px;
        font-weight: 500;
        transition: 0.3s;
        opacity: 0.8;
        background: none;
        border: none;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
    }

    .nav-menu a:hover, .logout-btn:hover {
        color: var(--red);
        opacity: 1;
    }

    .nav-menu a.active {
        color: var(--gold);
        opacity: 1;
        position: relative;
    }

    .nav-menu a.active::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -6px;
        width: 100%;
        height: 2px;
        background: var(--gold);
    }

    /* ================= MAIN CONTENT ================= */
    .admin-wrapper {
        padding: 120px 80px 60px; /* Padding atas agar tidak tertutup navbar */
        min-height: 100vh;
    }

    .page-header {
        margin-bottom: 40px;
        border-left: 5px solid var(--red);
        padding-left: 20px;
    }

    .page-header h2 {
        font-size: 32px;
        font-weight: 700;
        letter-spacing: 1px;
        margin: 0;
    }

    /* ================= STAT CARDS ================= */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 25px;
        margin-bottom: 50px;
    }

    .stat-box {
        background: var(--card-bg);
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 30px;
        border-radius: 4px;
        transition: 0.4s;
        position: relative;
        overflow: hidden;
    }

    .stat-box:hover {
        transform: translateY(-10px);
        border-color: var(--red);
        box-shadow: 0 10px 30px rgba(225, 6, 0, 0.15);
    }

    .stat-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--gold);
    }

    .stat-label {
        color: #888;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
    }

    .stat-value {
        font-size: 28px;
        font-weight: 700;
        color: var(--white);
    }

    /* ================= TABLE DESIGN ================= */
    .table-section {
        background: var(--card-bg);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 4px;
    }

    .table-title {
        padding: 20px 30px;
        background: linear-gradient(90deg, #1a1a1a, transparent);
        border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        color: var(--gold);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        text-align: left;
        padding: 18px 30px;
        font-size: 12px;
        color: #666;
        text-transform: uppercase;
        background: rgba(255, 255, 255, 0.02);
    }

    td {
        padding: 18px 30px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.03);
        font-size: 14px;
        color: #ccc;
    }

    tr:hover td {
        background: rgba(225, 6, 0, 0.02);
        color: var(--white);
    }

    .status-badge {
        padding: 4px 12px;
        font-size: 11px;
        font-weight: 700;
        border-radius: 2px;
        text-transform: uppercase;
    }

    .status-lunas { background: rgba(0, 255, 0, 0.1); color: #00ff00; border: 1px solid #00ff00; }
    .status-pending { background: rgba(212, 175, 55, 0.1); color: var(--gold); border: 1px solid var(--gold); }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        nav { padding: 20px 30px; }
        .admin-wrapper { padding: 100px 30px 40px; }
        .nav-menu a { margin-left: 15px; font-size: 12px; }
    }
</style>

{{-- NAVBAR BARU (REPLACEMENT FOR NAVIGATION.BLADE) --}}
<nav>
    <div class="nav-logo">
        <a href="{{ route('admin.dashboard') }}" style="text-decoration: none;">
            <h1>RIZKY <span>FUTSAL</span></h1>
        </a>
    </div>
    <div class="nav-menu">
        <a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a>
        <a href="#">Lapangan</a>
        <a href="#">Booking List</a>
        <a href="#">Users</a>
        
        {{-- Tombol Logout di Paling Kanan --}}
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</nav>

<div class="admin-wrapper">
    <div class="page-header">
        <h2><span style="color: var(--red)">ADMIN</span> PANEL</h2>
        <p style="color: #666; font-size: 14px;">Selamat datang kembali, {{ auth()->user()->name }}</p>
    </div>

    <div class="stats-grid">
        <div class="stat-box">
            <p class="stat-label">Total Booking</p>
            <p class="stat-value">{{ $totalBooking }}</p>
        </div>
        <div class="stat-box">
            <p class="stat-label">Pendapatan</p>
            <p class="stat-value" style="color: var(--gold)">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
        </div>
        <div class="stat-box">
            <p class="stat-label">Total Lapangan</p>
            <p class="stat-value">{{ $totalLapangan }}</p>
        </div>
        <div class="stat-box">
            <p class="stat-label">Total Pelanggan</p>
            <p class="stat-value">{{ $totalUser }}</p>
        </div>
    </div>

    <div class="table-section">
        <div class="table-title">Recent Transactions</div>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>Pemesan</th>
                        <th>Arena</th>
                        <th>Jadwal</th>
                        <th>Status</th>
                        <th style="text-align: right;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentBookings as $booking)
                    <tr>
                        <td>
                            <div style="font-weight: 600; color: var(--white);">{{ $booking->nama_pemesan }}</div>
                            <div style="font-size: 12px; color: #555;">{{ $booking->no_hp }}</div>
                        </td>
                        <td>{{ $booking->lapangan->nama_lapangan ?? 'N/A' }}</td>
                        <td>
                            <div>{{ \Carbon\Carbon::parse($booking->tanggal)->format('d M Y') }}</div>
                            <div style="font-size: 12px; color: var(--red-dark);">{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</div>
                        </td>
                        <td>
                            @if($booking->status == 'lunas')
                                <span class="status-badge status-lunas">Paid</span>
                            @else
                                <span class="status-badge status-pending">Waiting</span>
                            @endif
                        </td>
                        <td style="text-align: right; font-weight: 700; color: var(--white);">
                            Rp {{ number_format($booking->total_harga, 0, ',', '.') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 50px; color: #444;">No recent bookings found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <footer style="margin-top: 60px; text-align: center; color: #333; font-size: 12px; letter-spacing: 1px;">
        &copy; {{ date('Y') }} RIZKY FUTSAL MANAGEMENT SYSTEM. ALL RIGHTS RESERVED.
    </footer>
</div>
@endsection