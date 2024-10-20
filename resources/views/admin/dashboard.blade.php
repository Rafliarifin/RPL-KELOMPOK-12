@extends('welcome')

@section('content')
<div class="container mx-auto mt-12">
    <h1 class="text-3xl font-bold text-center">Admin Dashboard</h1>
    <div class="flex justify-center mt-8">
    <a href="{{ route('admin.cars.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Pengelolaan Mobil</a>
    </div>
</div>
@endsection