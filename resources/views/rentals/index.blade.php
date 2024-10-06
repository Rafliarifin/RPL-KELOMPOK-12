@extends('layout')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Rental List</h1>
    <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 text-left">Name</th>
                <th class="py-2 px-4 text-left">Phone</th>
                <th class="py-2 px-4 text-left">Email</th>
                <th class="py-2 px-4 text-left">Car</th>
                <th class="py-2 px-4 text-left">Duration</th>
                <th class="py-2 px-4 text-left">Total Price</th>
                <th class="py-2 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rentals as $rental)
                <tr>
                    <td class="py-2 px-4">{{ $rental->name }}</td>
                    <td class="py-2 px-4">{{ $rental->phone }}</td>
                    <td class="py-2 px-4">{{ $rental->email }}</td>
                    <td class="py-2 px-4">{{ $rental->car->name }}</td>
                    <td class="py-2 px-4">{{ $rental->duration }} days</td>
                    <td class="py-2 px-4">Rp.{{ number_format($rental->total_price, 2) }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('rentals.edit', $rental->id) }}" class="text-blue-500 hover:underline mr-2">Edit</a>
                        <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this rental?')">Delete</button>
                        </form>
                        <a href="https://api.whatsapp.com/send/?phone=%2B6285256836592&text&type=phone_number&app_absent=0" class="text-green-500 hover:underline mr-2">Konfirmasi</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection