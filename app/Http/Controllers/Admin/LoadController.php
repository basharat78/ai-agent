<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\load;



class LoadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loads=Load::latest()->paginate(10);
        return view('admin.loads.index',compact('loads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
        return view('admin.loads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          'source' => 'required|max:50',
            'external_id' => 'required|max:100',
            'broker_name' => 'required|max:100',
            'broker_phone' => 'required|max:20',
            'origin_city' => 'required|max:255',
            'origin_state' => 'required|max:255',
            'destination_city' => 'required|max:255',
            'destination_state' => 'required|max:255',
            'pickup_date' => 'required|date',
            'equipment_type' => 'required|max:50',
            'weight' => 'required|integer',
            'rate' => 'nullable|numeric',
            'status' => 'required|in:fetched,matched,calling,confirmed,rejected,expired'

        ]);

        load::create($request->all());

        return redirect()->route('admin.loads.index')->with('success', 'Load created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(load $load)
    {
        return view('admin.loads.edit',compact('load'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(load $load, Request $request)
    {
        $request->validate([
            'source' => 'required|max:50',
            'external_id' => 'required|max:100',
            'broker_name' => 'required|max:100',
            'broker_phone' => 'required|max:20',
            'origin_city' => 'required|max:255',
            'origin_state' => 'required|max:255',
            'destination_city' => 'required|max:255',
            'destination_state' => 'required|max:255',
            'pickup_date' => 'required|date',
            'equipment_type' => 'required|max:50',
            'weight' => 'required|integer',
            'rate' => 'nullable|numeric',
            'status' => 'required|in:fetched,matched,calling,confirmed,rejected,expired'
        ]);
        $load->update($request->all());
        return redirect()->route('admin.loads.index')->with('success','Load updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(load $load)
    {
        $load->delete();
           return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
