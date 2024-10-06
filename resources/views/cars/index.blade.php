@extends('layout')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Available Cars</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($cars as $car)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">{{ $car->name }}</h2>
                <p class="text-gray-600 mb-4">Price per day: Rp.{{ number_format($car->price_per_day, 2) }}</p>
                <p class="text-gray-600 mb-4">Available: {{ $car->stock }}</p>
                <a href="{{ route('rentals.create', ['car_id' => $car->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Rent Now</a>
            </div>
        @endforeach
    </div>
@endsection