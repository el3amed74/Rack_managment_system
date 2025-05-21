<?php

namespace App\Http\Controllers;

use App\Models\hotels;
use App\Models\buldings;
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
    public function newBuildingForm()
    {
        $hotels = hotels::all(); // Get all hotels
        return view('index.addbuilding', compact('hotels'));
    }

    public function StoreBuilding(Request $request)
    {
        // ✅ Step 1: Validate the request
        $validated = $request->validate([
            'rackid' => 'required|string|max:255',
            'brackid' => 'required|string|max:255',
            'buildingName' => 'required|string|max:255',
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        try {
            // Step 2: Create and save the building
            $building = new buldings();
            $building->rack_id = $validated['rackid'];
            $building->building_r_id = $validated['brackid'];
            $building->building_name = $validated['buildingName'];
            $building->hotel_id = $validated['hotel_id'];
            $building->save();

            // Step 3: Redirect with success message
            return redirect()->back()->with('success', 'Building added successfully.');

        } catch (\Exception $e) {
            // Step 4: Redirect with error message
            return redirect()->back()->with('error', 'Failed to add building. Please try again.');
        }
    }

}
