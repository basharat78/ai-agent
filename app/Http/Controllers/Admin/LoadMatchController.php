<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoadMatch;
use Illuminate\Http\Request;

class LoadMatchController extends Controller
{

    public function index(){
        $matches = LoadMatch::with('loadDetails', 'truck', 'dispatcher')->latest()->paginate(10);
        return view("admin.load_matches.index", compact("matches"));
    }

    public function updateStatus(Request $request, LoadMatch $match){
        $request->validate([
          'status' => 'required|in:pending,confirmed,rejected'
                 ]);
         $match->update(['status' => $request->status]);
         return back()->with('success', 'Match status updated successfully.');
    
    }

    public function destroy(LoadMatch $match){
          $match->delete();
           return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

}
