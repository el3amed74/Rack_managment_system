<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rack_info extends Model
{
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
}
