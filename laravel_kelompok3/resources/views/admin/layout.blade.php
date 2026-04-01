<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rizki Futsal | Admin</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gray-800 text-white flex flex-col">

        <!-- PROFIL / LOGO -->
        <div class="p-6 text-center border-b border-red-700">
            <div class="w-24 h-24 rounded-full bg-red-700 mx-auto mb-3 flex items-center justify-center text-3xl font-bold shadow">
                RF
            </div>
            <h2 class="font-bold text-lg tracking-wide">RIZKI FUTSAL</h2>
            <p class="text-sm text-gray-300">Admin Panel</p>
        </div>

        <!-- MENU -->
        <nav class="flex-1 mt-4">
            <a href="/admin/dashboard"
               class="block px-6 py-3 hover:bg-red-700 transition">
               📊 Dashboard
            </a>

            <a href="/admin/lapangan"
               class="block px-6 py-3 hover:bg-red-700 transition">
               ⚽ Data Lapangan
            </a>

            <a href="/admin/booking"
               class="block px-6 py-3 hover:bg-red-700 transition">
               📅 Booking
            </a>

            <a href="/admin/jadwal"
               class="block px-6 py-3 hover:bg-red-700 transition">
               ⏰ Jadwal
            </a>

            <a href="/admin/user"
               class="block px-6 py-3 hover:bg-red-700 transition">
               👥 User
            </a>

            <a href="/admin/laporan"
               class="block px-6 py-3 hover:bg-red-700 transition">
               💰 Laporan
            </a>
        </nav>

    </aside>

    <!-- MAIN -->
    <div class="flex-1 flex flex-col">

        <!-- TOPBAR (GALAXY STYLE) -->
        <header class="bg-gray-700 text-white px-6 py-4 flex justify-between items-center shadow">
            <div>
                <h1 class="text-lg font-semibold">@yield('title')</h1>
                <p class="text-sm text-gray-300">Rizki Futsal Management</p>
            </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button
                type="submit"
                class="bg-red-700 hover:bg-red-800 px-4 py-2 rounded text-sm shadow">
                Logout
            </button>
        </form>
        </header>

        <!-- CONTENT -->
        <main class="p-6 bg-gray-100 flex-1">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>
