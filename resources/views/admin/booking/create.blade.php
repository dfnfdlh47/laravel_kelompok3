<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5 mb-5">
    <div class="card shadow-sm w-75 mx-auto">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Tambah Data Booking</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Akun User</label>
                        <select name="user_id" class="form-select" required>
                            <option value="">-- Pilih User --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Pilih Lapangan</label>
                        <select name="lapangan_id" class="form-select" required>
                            <option value="">-- Pilih Lapangan --</option>
                            @foreach($lapangans as $lapangan)
                                <option value="{{ $lapangan->id }}">{{ $lapangan->nama_lapangan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nama Pemesan</label>
                        <input type="text" name="nama_pemesan" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>No. HP</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Tanggal Booking</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="form-control" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Jam Selesai</label>
                        <input type="time" name="jam_selesai" class="form-control" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Durasi (Jam)</label>
                        <input type="number" name="durasi" class="form-control" placeholder="Contoh: 2" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Total Harga (Rp)</label>
                        <input type="number" name="total_harga" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Status Pembayaran</label>
                        <select name="status" class="form-select">
                            <option value="Booking">Booking (Belum Lunas)</option>
                            <option value="Lunas">Lunas</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>