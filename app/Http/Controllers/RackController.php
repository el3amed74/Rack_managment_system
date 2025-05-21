<?php

namespace App\Http\Controllers;

use App\Models\hotels;
use App\Models\Rack_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RackController extends Controller
{
    public function GetRackInfo($hotel_id,$buildingRId)
    {


        $rackInfo = DB::table('rack_info')
            ->join('switch', 'rack_info.switch_id', '=', 'switch.id')
            ->select('rack_info.*', 'switch.*')
            ->where('building_r_id', '=', $buildingRId)
            ->get();
        
        $hotel = hotels::find($hotel_id);
        // dd($hotel);
        // $rackInfo = Rack_info::with('switch')->get();
        // $rackInfo = Rack_info::all();
        return view('rackInfo', ['rackinfo' => $rackInfo,'hotel'=> $hotel]);
    }
}
