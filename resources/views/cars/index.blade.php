@extends("welcome")

@section("content")
<section class="bg-primary2 py-10 h-screen flex flex-col items-center">
    <h1 class="text-3xl font-bold mb-8 text-center" style="color: #fdfac7; font-family: 'Poppins';">Daftar Mobil</h1>
    <div class="overflow-y-auto flex-grow">
       
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 p-4">
            @foreach($cars as $car)
                @if($car->stock > 5)
                    <div class="p-6 rounded-lg shadow-md" style="background-color: #fdfac7;">
                        @if($car->image_path)
                            <img src="{{ asset($car->image_path) }}" alt="{{ $car->name }}" class="w-full h-48 object-cover mb-4">
                        @else
                            <div class="bg-gray-200 w-full h-48 flex items-center justify-center mb-2">
                                <span class="text-gray-500">No image available</span>
                            </div>
                        @endif
                        <h2 class="text-xl font-semibold mb-2">{{ $car->name }}</h2>
                        <p class="text-gray-600 mb-4">Harga per hari: Rp.{{ number_format($car->price_per_day, 2) }}</p>
                        <p class="text-gray-600 mb-4">Stok: {{ $car->stock }}</p>
                        <a href="{{ route('rentals.create', ['car_id' => $car->id]) }}" class="action-button">Pesan sekarang</a>
                    </div>
                @endif
            @endforeach
        </div>

        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-40 mt-8">
            @foreach($cars as $car)
                @if($car->stock <= 2)
                    <div class="p-6 rounded-lg shadow-md" style="background-color: #fdfac7;">
                        @if($car->image_path)
                            <img src="{{ asset($car->image_path) }}" alt="{{ $car->name }}" class="w-full h-48 object-cover mb-4">
                        @else
                            <div class="bg-gray-200 w-full h-48 flex items-center justify-center mb-2">
                                <span class="text-gray-500">No image available</span>
                            </div>
                        @endif
                        <h2 class="text-xl font-semibold mb-2">{{ $car->name }}</h2>
                        <p class="text-gray-600 mb-4">Harga per hari: Rp.{{ number_format($car->price_per_day, 2) }}</p>
                        <p class="text-gray-600 mb-4">Stok: {{ $car->stock }}</p>
                        <a href="{{ route('rentals.create', ['car_id' => $car->id]) }}" class="action-button">Pesan sekarang</a>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 p-4">
            @foreach($cars as $car)
                @if($car->stock > 5)
                    <div class="p-6 rounded-lg shadow-md" style="background-color: #fdfac7;">
                        @if($car->image_path)
                            <img src="{{ asset($car->image_path) }}" alt="{{ $car->name }}" class="w-full h-48 object-cover mb-4">
                        @else
                            <div class="bg-gray-200 w-full h-48 flex items-center justify-center mb-2">
                                <span class="text-gray-500">No image available</span>
                            </div>
                        @endif
                        <h2 class="text-xl font-semibold mb-2">{{ $car->name }}</h2>
                        <p class="text-gray-600 mb-4">Harga per hari: Rp.{{ number_format($car->price_per_day, 2) }}</p>
                        <p class="text-gray-600 mb-4">Stok: {{ $car->stock }}</p>
                        <a href="{{ route('rentals.create', ['car_id' => $car->id]) }}" class="action-button">Pesan sekarang</a>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-4 mt-8 justify-center items-center">
            @foreach($cars as $car)
                @if($car->stock >= 8)
                    <div class="p-6 rounded-lg shadow-md" style="background-color: #fdfac7;">
                        @if($car->image_path)
                            <img src="{{ asset($car->image_path) }}" alt="{{ $car->name }}" class="w-full h-48 object-cover mb-4">
                        @else
                            <div class="bg-gray-200 w-full h-48 flex items-center justify-center mb-2">
                                <span class="text-gray-500">No image available</span>
                            </div>
                        @endif
                        <h2 class="text-xl font-semibold mb-2">{{ $car->name }}</h2>
                        <p class="text-gray-600 mb-4">Harga per hari: Rp.{{ number_format($car->price_per_day, 2) }}</p>
                        <p class="text-gray-600 mb-4">Stok: {{ $car->stock }}</p>
                        <a href="{{ route('rentals.create', ['car_id' => $car->id]) }}" class="action-button">Pesan sekarang</a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    
</section>
@endsection
