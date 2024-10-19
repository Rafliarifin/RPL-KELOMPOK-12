@extends('welcome')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Edit Rental</h1>
    <form action="{{ route('rentals.update', $rental->id) }}" method="POST" class="p-6 rounded-lg shadow-md max-w-md mx-auto" style="background-color: #fdfac7";>
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
            <input type="text" name="name" id="name" value="{{ $rental->name }}" class="w-full px-3 py-2 border-2 border-black border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-bold mb-2">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ $rental->phone }}" class="w-full px-3 py-2 border-2 border-black border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ $rental->email }}" class="w-full px-3 py-2 border-2 border-black border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="car_id" class="block text-gray-700 font-bold mb-2">Car</label>
            <select name="car_id" id="car_id" class="w-full px-3 py-2 border-2 border-black border rounded-lg" required>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}" {{ $rental->car_id == $car->id ? 'selected' : '' }}>
                        {{ $car->name }} - Rp{{ number_format($car->price_per_day, 2) }} per day
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="duration" class="block text-gray-700 font-bold mb-2">Duration (days)</label>
            <input type="number" name="duration" id="duration" value="{{ $rental->duration }}" class="w-full px-3 py-2 border-2 border-black border rounded-lg" min="1" required>
        </div>
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-900">Update Rental</button>
    </form>
@endsection