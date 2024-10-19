<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Car Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> {{-- Pastikan ini diperlukan --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
</head>

<body class = "container-fluid">
    <nav class="flex justify-between items-center p-4" style="background-color: #641302 ;">
        <!-- Ikon mobil dan teks ON-RENT di kiri -->
        <div class="flex items-center space-x-2">
            <!-- Ikon Mobil di Kiri -->
            <i class="fas fa-car text-3xl" style="color: #fdfac7"; ></i>
            <!-- Teks ON-RENT -->
            <h1><a href="{{ route('home') }}" class="text-4xl font-bold" style="color: #fdfac7; font-family: 'poppins',sans-serif;">ON-RENT</a></h1>
        </div>

        <!-- Navigasi di kanan -->
        <div>

            <ul class="flex space-x-20">            
                <li>
                    <a href="{{ route('home') }}" 
                        class="text-white text-2xl font-bold"style="color: #EEEBDD "
                        style="font-family: 'Comic Sans MS', cursive, sans-serif;">
                        <i class="fas fa-home nav-icon mr-2"></i> Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('cars.index') }}" 
                        class="text-white text-2xl font-bold"style=" color: #EEEBDD "
                        style="font-family: 'Comic Sans MS', cursive, sans-serif;">
                        <i class="fas fa-car nav-icon mr-2"></i> List Mobil
                    </a>
                </li>
                <li>
                    <a href="{{ route('rentals.index') }}" 
                        class="text-white text-2xl font-bold"style=" color: #EEEBDD " 
                        style="font-family: 'Comic Sans MS', cursive, sans-serif;">
                        <i class="fas fa-shopping-cart nav-icon mr-2"></i> Order
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Konten Utama -->
    <div class="container-fluid mx-auto mt-19 bg-primary2 w-full min-h-screen">
    
        @yield('content') 
    </div>
</body>


</html>
