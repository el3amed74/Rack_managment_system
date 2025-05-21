<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buldings;
use App\Models\Rack_info;
use App\Models\switches;
use App\Models\hotels;

class BuildingRackController extends Controller
{

    public function showRacks($hotel_id, $name)
    {
        // Get buildings matching both name and hotel ID
        $buildings = buldings::where('building_name', $name)
            ->where('hotel_id', $hotel_id)
            ->get();

        if ($buildings->isEmpty()) {
            abort(404, 'Building not found.');
        }

        $racks = collect();

        foreach ($buildings as $building) {
            $rackNumbers = explode(',', $building->rack_id);
            foreach ($rackNumbers as $rackNumber) {
                $racks->push((object) [
                    'rack_number' => trim($rackNumber)
                ]);
            }
        }

        $building = $buildings[0]; // use the first matching building
        $hotel = hotels::find($hotel_id);

        return view('index.racks', compact('racks', 'building', 'hotel'));
    }

    public function newRackForm()
    {
        $hotels = hotels::all(); // Get all hotels
        return view('index.addrack', compact('hotels'));
    }

    public function StoreRack(Request $request)
    {
        
        // Step 1: Validate the form input
        $validated = $request->validate([
            // Product (rack) data
            'building_r_id' => 'required|string|max:255',
            'switch_id' => 'required|string|max:255',
            'product_panal' => 'nullable|string|max:255',
            'product_serial' => 'nullable|string|max:255',
            'product_mac' => 'nullable|string|max:255',
            'product_model' => 'nullable|string|max:255',
            'product_port' => 'nullable|string|max:255',
            'device_name' => 'nullable|string|max:255',
            'site_name' => 'nullable|string|max:255',

            // Switch data
            'switchname' => 'required|string|max:255',
            'serial_number' => 'nullable|string|max:255',
            'mac_add' => 'nullable|string|max:255',
            'ip_add' => 'nullable|string|max:255',
            'up_link_core1' => 'nullable|string|max:255',
            'up_link_core2' => 'nullable|string|max:255',
            'port_number' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
        ]);

        try {
            // Step 2: Create and store switch data
            $switch = new switches();
            $switch->name = $validated['switchname'];
            $switch->serial_number = $validated['serial_number'] ?? null;
            $switch->mac_add = $validated['mac_add'] ?? null;
            $switch->ip_add = $validated['ip_add'] ?? null;
            $switch->up_link_core1 = $validated['up_link_core1'] ?? null;
            $switch->up_link_core2 = $validated['up_link_core2'] ?? null;
            $switch->port_number = $validated['port_number'] ?? null;
            $switch->model = $validated['model'] ?? null;
            $switch->save();

            // Step 3: Create and store rack info data
            $rack = new Rack_info();
            $rack->building_r_id = $validated['building_r_id'];
            $rack->switch_id = $validated['switch_id']; // use the newly created switch's ID
            $rack->product_panal = $validated['product_panal'] ?? null;
            $rack->product_serial = $validated['product_serial'] ?? null;
            $rack->product_mac = $validated['product_mac'] ?? null;
            $rack->product_model = $validated['product_model'] ?? null;
            $rack->product_port = $validated['product_port'] ?? null;
            $rack->device_name = $validated['device_name'] ?? null;
            $rack->site_name = $validated['site_name'] ?? null;
            $rack->save();

            return redirect()->back()->with('success', 'Rack and switch data added successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add rack data. Error: ' . $e->getMessage());
        }
    }

}
