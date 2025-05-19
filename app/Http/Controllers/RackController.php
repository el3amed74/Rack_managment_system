<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rack_info;
use Illuminate\Support\Facades\DB;

class RackController extends Controller
{
    public function GetRackInfo()
    {


        $rackInfo = DB::table('rack_info')
            ->join('switch', 'rack_info.switch_id', '=', 'switch.id')
            ->select('rack_info.*', 'switch.*')
            ->get();

        // $rackInfo = Rack_info::with('switch')->get();
        // $rackInfo = Rack_info::all();
        return view('rackInfo', ['rackinfo' => $rackInfo]);
    }
}
