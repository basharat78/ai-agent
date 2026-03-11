<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Dispatcher;

class DispatcherController extends Controller
{
    public function index(){
        $dispatchers = Dispatcher::paginate(10);
        return view("admin.dispatchers.index", compact('dispatchers'));
    }
    public function create(){
        return view("admin.dispatchers.create");
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:dispatchers,email',
            'role' => 'required|in:admin,team_lead,dispatcher',
            'is_active' => 'boolean',
        ]);
       Dispatcher::create($request->all());
        return redirect()->route('admin.dispatchers.index')->with('success', 'Dispatcher created successfully.');
    }
    public function edit(Dispatcher $dispatcher){
        return view("admin.dispatchers.edit", compact('dispatcher'));
    }
    public function update(Request $request, Dispatcher $dispatcher){
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:dispatchers,email,'.$dispatcher->id,
            'role' => 'required|in:admin,team_lead,dispatcher',
            'is_active' => 'boolean',
        ]);
        $dispatcher->update($request->all());
        return redirect()->route('admin.dispatchers.index')->with('success', 'Dispatcher updated successfully.');
    }

    public function destroy(Dispatcher $dispatcher){
        $dispatcher->delete();
          return response(['status' => 'success', 'message' => 'Deleted Successfully!']);

    }

}
