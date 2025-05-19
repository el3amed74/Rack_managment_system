<?php

namespace App\Http\Controllers;

use App\Models\hotels;
use Illuminate\Http\Request;

class HotelBuildingController extends Controller
{
    public function show($id)
    {
        return view('index.show', ['id' => $id]);
    }
    public function showBuildings($id)
    {
        // Retrieve the hotel by ID along with its associated buildings
        $hotel = hotels::with('buildings')->findOrFail($id);

        // Return the view with the hotel data
        return view('index.buildings', compact('hotel'));
    }

}
