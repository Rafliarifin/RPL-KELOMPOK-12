<!-- resources/views/admin/login.blade.php -->
@extends('welcome')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto">
        <h1 class="text-3xl font-bold mb-2 text-center" style="color: #fdfac7;font-family:'poppins'"; >Admin login</h1>

        <form action="{{ route('admin.login') }}" method="POST" class="p-6 rounded-lg shadow-md max-w-md mx-auto" style="background-color: #fdfac7;">
            @csrf

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password" name="password" id="password" class="w-full px-3 py-2 border-2 border-black rounded-lg" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit" class="action-button">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection