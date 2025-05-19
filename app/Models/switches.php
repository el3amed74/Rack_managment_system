<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Rack_info;
class switches extends Model
{
    protected $table = "switch";
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
    public function rackInfos()
    {
        return $this->hasMany(Rack_Info::class, 'switch_id');
    }
}
