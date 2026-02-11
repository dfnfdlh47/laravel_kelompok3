<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rizki Futsal | Admin</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200">

<div class="flex min-h-screen">
    <aside class="w-64 bg-red-700 p-6">
        <h1 class="text-2xl font-bold">FUTSAL ADMIN</h1>
             <nav class="mt-6 space-y-2">
                <a href="/admin/dashboard" class="block">Dashboard</a>
                <a href="/admin/booking" class="block">Booking</a>
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
