<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }


    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price_per_day' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Simpan gambar ke public/images
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);

        Car::create([
            'name' => $validated['name'],
            'price_per_day' => $validated['price_per_day'],
            'stock' => $validated['stock'],
            'image_path' => 'images/' . $imageName // Simpan path relatif
        ]);

        return redirect()->route('admin.cars.index')->with('success', 'mobil berhasil ditambah');
    }

    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price_per_day' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($car->image_path && file_exists(public_path($car->image_path))) {
                unlink(public_path($car->image_path));
            }
            
            // Simpan gambar baru
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            
            $validated['image_path'] = 'images/' . $imageName;
        }

        $car->update($validated);

        return redirect()->route('admin.cars.index')->with('success','mobil berhasil diupdate');
    }

    public function destroy(Car $car)
    {
        // Cek apakah ada rental yang terkait dengan mobil
        if ($car->rentals()->count() > 0) {
            return redirect()->route('admin.cars.index')->with('error','Tidak bisa mengahpus mobil yang sedang disewa');
        }

        // Hapus gambar terkait jika ada
        if ($car->image_path && Storage::exists(str_replace('storage/', 'public/', $car->image_path))) {
            Storage::delete(str_replace('storage/', 'public/', $car->image_path));
        }

        // Hapus mobil
        $car->delete();

        return redirect()->route('admin.cars.index')->with('success','mobil berhasil dihapus');
    }
}

