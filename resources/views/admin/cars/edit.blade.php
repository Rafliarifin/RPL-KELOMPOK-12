@extends('welcome')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-center" style="color: #fdfac7; font-family: 'Poppins';">Edit Mobil</h1>

        <form action="{{ route('admin.cars.update', $car) }}" method="POST" enctype="multipart/form-data" class="p-6 rounded-lg shadow-md" style="background-color: #fdfac7;">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Nama Mobil</label>
                <input type="text" name="name" id="name" value="{{ $car->name }}" class="w-full px-3 py-2 border-2 border-black rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="price_per_day" class="block text-gray-700 font-bold mb-2">Harga per Hari</label>
                <input type="number" name="price_per_day" id="price_per_day" value="{{ $car->price_per_day }}" class="w-full px-3 py-2 border-2 border-black rounded-lg" min="0" required>
            </div>

            <div class="mb-4">
                <label for="stock" class="block text-gray-700 font-bold mb-2">Stok</label>
                <input type="number" name="stock" id="stock" value="{{ $car->stock }}" class="w-full px-3 py-2 border-2 border-black rounded-lg" min="0" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Gambar Mobil</label>
                @if($car->image_path && file_exists(public_path($car->image_path)))
                <div class="mb-2">
                    <img src="{{ asset($car->image_path) }}" alt="{{ $car->name }}" class="w-35 h-32 object-cover rounded-lg">
                </div>
                @endif
                <input type="file" name="image" id="image" class="w-full px-3 py-2 border-2 border-black rounded-lg">
                <small class="text-gray-500">Kosongkan jika tidak ingin mengganti gambar</small>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="action-button">Update Mobil</button>
            </div>
        </form>
    </div>
</div>
@endsection