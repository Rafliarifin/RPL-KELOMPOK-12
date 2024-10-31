@extends('welcome')

@section('content')


    <!-- Bagian konten utama dengan warna background -->
    <section class="bg-primary py-24">
        <div class="container mx-auto text-center">
            <h1 class="text-3xl font-bold  mb-4" style="color: #fdfac7 ;font-family: 'poppins'";>Jasa Rental Mobil Online</h1><br><br>
            <a href="{{ route('cars.index') }}" class="btn btn-secondary text-lg font-bold py-5 px-9 rounded-lg">Pesan Sekarang</a><br><br><br><br><br><br><br><br><br><br><br>
            <p class="text-2xl font-semibold text-white" style="font-family: 'Comic Sans MS', cursive, sans-serif;">"Nikmati Kemudahan Menyewa Mobil Dengan Layanan Kami"</p><br><br>

        </div>
        
        <div class="container mx-auto text-center">
        <div class="flex justify-around">
            <div class="feature text-white">
                <i class="fas fa-shield-alt fa-2x text-dark mb-1"></i>
                <h3 class="text-xl font-semibold ">Asuransi Mobil</h3>
                <p class="text-lg ">Mobil Anda aman dengan asuransi lengkap.</p>
            </div>
            <div class="feature text-white">
                <i class="fas fa-car-side fa-2x text-dark mb-2"></i>
                <h3 class="text-xl font-semibold">Pengantaran Gratis</h3>
                <p class="text-lg">Kami antar mobil ke lokasi Anda.</p>
            </div>
            <div class="feature text-white">
                <i class="fas fa-clock fa-2x text-dark mb-2"></i>
                <h3 class="font-semibold">Layanan 24 Jam</h3>
                <p class="text-lg">Layanan siap membantu kapan saja.</p>
            </div>
            </div>
        </div>

    </section>

    

    
        
@endsection
