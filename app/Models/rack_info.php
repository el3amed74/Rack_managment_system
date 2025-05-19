<?php

namespace App\Models;

use App\Models\switches;
use Illuminate\Database\Eloquent\Model;

class Rack_info extends Model
{
    protected $table = 'rack_info';
    protected $fillable = [
        'building_r_id',
        'switch_id',
        'product_panal',
        'product_serial',
        'product_mac',
        'product_model',
        'product_port',
        'device_name',
        'site_name',
    ];
    public function switch()
    {
        return $this->belongsTo(switches::class, 'id');
    }
}
