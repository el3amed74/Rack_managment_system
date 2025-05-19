<?php

namespace App\Models;

use App\Models\hotels;
use Illuminate\Database\Eloquent\Model;

class buldings extends Model
{
    protected $table = "buildings";
    protected $fillable = [
        'rack_id',
        'bulding_r_id',
        'hotel_id',
        'building_name', // Add this line

    ];
    public function hotel()
    {
        return $this->belongsTo(hotels::class, 'hotel_id');
    }
}
