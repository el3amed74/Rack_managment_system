<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class switches extends Model
{
    protected $fillable = [
        "name",
        "serial_number",
        "mac_add",
        "ip_add",
        "up_link_core1",
        "up_link_core2",
        "port_number",
        "model"
        
    ];
}
