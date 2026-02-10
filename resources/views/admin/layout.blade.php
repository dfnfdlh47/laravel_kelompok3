<!DOCTYPE html>
<html>
<head>
<title>Admin Futsal</title>
@vite('resources/css/app.css')
</head>
<body class="bg-black text-white">

<div class="flex min-h-screen">
    <aside class="w-64 bg-red-700 p-6">
        <h1 class="text-2xl font-bold">FUTSAL ADMIN</h1>
             <nav class="mt-6 space-y-2">
                <a href="/admin/dashboard" class="block">Dashboard</a>
                <a href="/admin/booking" class="block">Booking</a>
            </nav>
        </aside>


    <main class="flex-1 p-8 bg-white text-black">
        @yield('content')
    </main>
</div>


</body>
</html>