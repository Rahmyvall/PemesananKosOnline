<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'boarding_house_id',
        'slug',
        'room_type',
        'square_feet',
        'capacity',
        'price_per_month',
        'is_available',
    ];

    public function boardingHouse()
    {
        return $this->hasMany(BoardingHouse::class);
    }

    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
