<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with('car')->get();
        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        $cars = Car::where('stock', '>', 0)->get();
        return view('rentals.create', compact('cars'));
    }

    public function calculatePrice(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'car_id' => 'required|exists:cars,id',
            'duration' => 'required|integer|min:1',
        ]);

        $car = Car::findOrFail($request->car_id);
        $totalPrice = $car->price_per_day * $request->duration;

        $rental = Rental::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'car_id' => $request->car_id,
            'duration' => $request->duration,
            'total_price' => $totalPrice,
        ]);

        $car->decrement('stock');

        return redirect()->route('rentals.index')->with('success', 'Rental created successfully.');
    }
    public function edit(Rental $rental)
{
    $cars = Car::all();
    return view('rentals.edit', compact('rental', 'cars'));
}

public function update(Request $request, Rental $rental)
{
    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'car_id' => 'required|exists:cars,id',
        'duration' => 'required|integer|min:1',
    ]);

    $oldCar = $rental->car;
    $newCar = Car::findOrFail($request->car_id);

    $rental->update([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'car_id' => $request->car_id,
        'duration' => $request->duration,
        'total_price' => $newCar->price_per_day * $request->duration,
    ]);

    // Adjust car stocks
    if ($oldCar->id !== $newCar->id) {
        $oldCar->increment('stock');
        $newCar->decrement('stock');
    }

    return redirect()->route('rentals.index')->with('success', 'Rental updated successfully.');
}

public function destroy(Rental $rental)
{
    $car = $rental->car;
    $rental->delete();
    $car->increment('stock');

    return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully and car stock updated.');
}
}