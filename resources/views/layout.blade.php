<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> {{-- Pastikan ini diperlukan --}}
</head>

<body class="bg-black">
    <nav class="bg-blue-600 p-4">
    <header>
        <nav class="container mx-auto py-4 px-6">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold">ON-RENT</a>
                <ul class="flex space-x-6">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-500">Home</a></li>
                    <li><a href="{{ route('cars.index') }}" class="hover:text-blue-500">List Mobil</a></li>
                    <li><a href="{{ route('rentals.index') }}" class="hover:text-blue-500">Order</a></li>
                </ul>
            </div>
        </nav>
    </header>
    </nav>

    <div class="container mx-auto mt-8">
        @yield('content') 
    </div>
</body>
</html>
