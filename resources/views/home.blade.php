{{-- resources/views/home.blade.php --}}

@extends('layout') {{-- Pastikan ini mengarah ke layout yang benar --}}

@section('content')


    <section class="bg-cover bg-center py-24" style="background-image: url('{{ asset('images/hero-bg.jpg') }}')">
        <div class="container mx-auto text-center text-white">
            <h1 class="text-5xl font-bold mb-4 text-white-500">Jasa Rental Mobil Online</h1><br><br>
            <a href="{{ route('cars.index') }}" class="btn btn-primary text-white-500 text-4xl bg-blue">Pesan Sekarang</a>
        </div>
    </section>

    

    <footer>
        <!-- Footer content here -->
    </footer>
@endsection
