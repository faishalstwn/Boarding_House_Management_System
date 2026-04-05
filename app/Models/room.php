<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class room extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'boarding_house_id',
        'name',
        'room_type',
        'square_feet',
        'capacity',
        'price_per_month',
        'is_available',
        
    ];  

    public function boardingHouse() {
        return $this->belongsTo(BoardingHouse::class);
    }

    public function images(){
        return $this->hasMany(roomimage::class);
    }
}
