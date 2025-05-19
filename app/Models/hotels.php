<?php

namespace App\Models;
use App\Models\buldings;
use Illuminate\Database\Eloquent\Model;

class hotels extends Model
{
    protected $fillable = [
        'name',
        'building_id',
        'logo',
    ];
    public function buildings()
    {
        return $this->hasMany(buldings::class, 'hotel_id');
    }

}
