<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TruckCreateRequest;
use App\Models\Truck;
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
        return view("admin.trucks.create", compact("dispatchers"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TruckCreateRequest $request)
    {
        $truck = new Truck();
        $truck->dispatcher_id = $request->dispatcher_id;
        $truck->truck_number = $request->truck_number;
        $truck->driver_name = $request->driver_name;
        $truck->driver_phone = $request->driver_phone;
        $truck->equipment_type = $request->equipment_type;
        $truck->max_weight = $request->max_weight;
        $truck->available_from = $request->available_from;
        $truck->current_location = $request->current_location;
    
        $truck->save();
        return redirect()->route("admin.trucks.index")->with("success","Truck Added Successfully");
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
