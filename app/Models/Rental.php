<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'email', 'car_id', 'duration', 'total_price'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}