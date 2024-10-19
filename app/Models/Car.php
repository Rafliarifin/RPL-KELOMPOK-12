<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price_per_day', 'stock', 'image_path'];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}