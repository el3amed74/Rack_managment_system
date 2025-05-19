<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hotels;

class HotelsController extends Controller
{
    // Show all hotels
    public function index()
    {
        $hotels = hotels::all();
        // return view('index.hotels', compact('hotels'));
        return view('index.hotels', ['hotels'=> $hotels]);
    }

    // Show the create hotel form
    public function create()
    {
        return view('index.add_hotel');
    }

    // Store new hotel
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
             'building_id' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload
        $imageName = time() . '_' . $request->logo->getClientOriginalName();
        $logoPath = 'images/hotels/' . $imageName;
        $request->logo->move(public_path('images/hotels'), $imageName);

        Hotels::create([
            'name' => $request->name,
            'building_id' => $request->building_id,
            'logo' => $logoPath,
        ]);

        return redirect()->route('hotels.index')->with('success', 'Hotel added successfully!');
    }
  public function show($id)
{
    return view('index.show', ['id' => $id]);
}

}
