@extends('welcome')

@section('content')

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<br>
<h1 class="text-3xl font-bold mb-8 text-center" style="color: #fdfac7;font-family:'poppins'"; >Rental List</h1>
<table class="bg-white shadow-md rounded-lg overflow-hidden table-container" style="background-color: #fdfac7; border: 1px solid #ccc;">
    <thead style="background-color: #800000; color: white;"> <!-- Warna merah maroon di header -->
        <tr>
            <th class="py-2 px-4 text-left" style="border: 1px solid #ccc;">Name</th>
            <th class="py-2 px-4 text-left" style="border: 1px solid #ccc;">Phone</th>
            <th class="py-2 px-4 text-left" style="border: 1px solid #ccc;">Email</th>
            <th class="py-2 px-4 text-left" style="border: 1px solid #ccc;">Car</th>
            <th class="py-2 px-4 text-left" style="border: 1px solid #ccc;">Duration</th>
            <th class="py-2 px-4 text-left" style="border: 1px solid #ccc;">Total Price</th>
            <th class="py-2 px-4 text-left" style="border: 1px solid #ccc;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rentals as $rental)
            <tr>
                <td class="py-2 px-4" style="border: 1px solid #ccc;">{{ $rental->name }}</td>
                <td class="py-2 px-4" style="border: 1px solid #ccc;">{{ $rental->phone }}</td>
                <td class="py-2 px-4" style="border: 1px solid #ccc;">{{ $rental->email }}</td>
                <td class="py-2 px-4" style="border: 1px solid #ccc;">{{ $rental->car->name }}</td>
                <td class="py-2 px-4" style="border: 1px solid #ccc;">{{ $rental->duration }} days</td>
                <td class="py-2 px-4" style="border: 1px solid #ccc;">Rp.{{ number_format($rental->total_price, 2) }}</td>
                <td class="py-2 px-4" style="border: 1px solid #ccc;">
                    <!-- Edit button with icon and hover effect -->
                    <a href="{{ route('rentals.edit', $rental->id) }}" class="action-button">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <!-- Delete button with icon and hover effect -->
                    <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" class="inline" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-button" onclick="return confirm('Anda yakin ingin menghapus data?')">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>

                    <!-- Confirm button with icon and hover effect -->
                    <a href="https://api.whatsapp.com/send/?phone=%2B6285256836592&text&type=phone_number&app_absent=0" class="action-button" onclick="return confirm('Ingin melanjutkan ke pembayaran?')">
                        <i class="fas fa-check-circle"></i> Konfirmasi
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection