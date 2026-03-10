<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TruckCreateRequest;
use App\Models\Truck;
use App\Models\Accessory;
use App\Models\Dispatcher;
class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trucks = Truck::with('dispatcher')->latest()->paginate(10);

        return view("admin.trucks.index", compact('trucks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { $dispatchers = Dispatcher::where('is_active', true)->get();
         $accessories = Accessory::all();
        return view("admin.trucks.create", compact("dispatchers","accessories"));
    }

    /**
     * Store a newly created resource in storage.
     */
  
   public function store(Request $request)
    {
        $request->validate([
            'dispatcher_id' => 'required|exists:dispatchers,id',
            'truck_number' => 'required|max:50',
            'driver_name' => 'required|max:100',
            'driver_phone' => 'required|max:20',
            'equipment_type' => 'required|in:dry_van,flatbed,reefer,step_deck',
            'max_weight' => 'required|integer',
            'available_from' => 'required|date',
            'current_location' => 'required|max:255',
            'accessories' => 'nullable|array',
            'accessories.*' => 'exists:accessories,id'
        ]);

        $truck = Truck::create($request->all());
        
        if ($request->has('accessories')) {
            $truck->accessories()->sync($request->accessories);
        }

        return redirect()->route('admin.trucks.index')->with('success', 'Truck created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Truck $truck)
    {
        $dispatchers = Dispatcher::where("is_active", true)->get();
              $accessories = Accessory::all();
        return view("admin.trucks.edit", compact('truck', 'dispatchers','accessories'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Truck $truck)
    {
        $request->validate([
            'dispatcher_id' => 'required|exists:dispatchers,id',
            'truck_number' => 'required|max:50',
            'driver_name' => 'required|max:100',
            'driver_phone' => 'required|max:20',
            'equipment_type' => 'required|in:dry_van,flatbed,reefer,step_deck',
            'max_weight' => 'required|integer',
            'available_from' => 'required|date',
            'current_location' => 'required|max:255',
            'accessories' => 'nullable|array',
            'accessories.*' => 'exists:accessories,id'
        ]);

        $truck->update($request->all());
        
        $truck->accessories()->sync($request->accessories ?? []);

        return redirect()->route('admin.trucks.index')->with('success', 'Truck updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */ 

    public function destroy(Truck $trucks)
    {
        $trucks->delete();
       return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
