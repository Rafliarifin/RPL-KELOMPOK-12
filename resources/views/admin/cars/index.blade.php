@extends('welcome')

@section('content')

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>


<div class="container mx-auto px-4 py-8">
<h1 class="text-3xl font-bold mb-2 text-center" style="color: #fdfac7;font-family:'poppins'"; >Kelola Mobil</h1>
    <div class="flex justify-between items-center mb-6 text-center">
        <form action="{{ route('admin.logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="action-button " style="margin-left: 650px; height: 40px">Logout</button>
        </form>
        <a href="{{ route('admin.cars.create') }}" class="action-button" style="margin-right: 650px; height: 40px">Tambah mobil</a>
    </div>

    @if(session('error'))
    <div class="border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4 shadow-lg" role="alert">
        <strong class="font-bold"><i class="fas fa-exclamation-circle"></i> Error:</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.style.display='none'">
                <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 2.935a1 1 0 01-1.414-1.414L8.586 10 5.652 7.066a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.934 2.935a1 1 0 010 1.414z"/>
            </svg>
        </span>
    </div>
    @endif

    @if(session('success'))
    <div class="border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4 shadow-lg" role="alert">
        <strong class="font-bold"><i class="fas fa-exclamation-circle"></i> Success:</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.style.display='none'">
                <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 2.935a1 1 0 01-1.414-1.414L8.586 10 5.652 7.066a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.934 2.935a1 1 0 010 1.414z"/>
            </svg>
        </span>
    </div>
    @endif


    <!-- Container with scroll -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden table-container" style="background-color: #fdfac7; border: 1px solid #ccc; max-width: 1000px;"> <!-- Membatasi lebar tabel -->
    <div class="overflow-y-auto" style="max-height: 550px;"> <!-- Tambahkan scrollbar pada tabel -->
        <table class="min-w-full" style="border-collapse: collapse; table-layout: fixed; width: 100%;"> <!-- Menetapkan lebar tabel ke 100% -->
            <thead style="background-color: #800000; color: white;">
                <tr>
                    <th class="py-4 px-4 text-left" style="border: 2px solid #000;">Gambar</th> <!-- Lebar tetap 20% -->
                    <th class="py-4 px-4 text-left" style="border: 2px solid #000;">Nama</th> <!-- Lebar tetap 20% -->
                    <th class="py-4 px-4 text-left" style="border: 2px solid #000;">Harga/Hari</th> <!-- Lebar tetap 20% -->
                    <th class="py-4 px-4 text-left" style="border: 2px solid #000;">Stok</th> <!-- Lebar tetap 10% -->
                    <th class="py-4 px-4 text-left" style="border: 2px solid #000; ">Aksi</th> <!-- Lebar tetap 30% -->
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($cars as $car)
                    <tr>
                        <td class="px-6 py-4" style="border: 2px solid #000; width: 20%;"> <!-- Mengatur lebar kolom -->
                            <img src="{{ asset($car->image_path) }}" alt="{{ $car->name }}" class="w-30 h-20 object-cover">
                        </td>
                        <td class="px-6 py-4" style="border: 2px solid #000;">{{ $car->name }}</td>
                        <td class="px-6 py-4" style="border: 2px solid #000;">Rp.{{ number_format($car->price_per_day, 2) }}</td>
                        <td class="px-6 py-4" style="border: 2px solid #000;">{{ $car->stock }}</td>
                        <td class="px-6 py-4" style="border: 2px solid #000;">
                            <div class="flex space-x-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('admin.cars.edit', $car) }}">
                                    <button class="action-button">
                                        <i class="fas fa-edit mr-2"></i> Edit
                                    </button>
                                </a>
                                <!-- Tombol Hapus -->
                                <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-button" onclick="return confirm('Yakin Ingin Menghapus?')">
                                        <i class="fas fa-trash-alt mr-2"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
