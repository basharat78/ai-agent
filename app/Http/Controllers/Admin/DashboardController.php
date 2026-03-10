<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CallLog;
use App\Models\Dispatcher;
use App\Models\Truck;
use App\Models\LoadMatch;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $dispatcherCount = Dispatcher::count();
        $truckCount = Truck::count();
         $availableTrucks = Truck::where('status', 'available')->count();
        return view('admin.dashboard.index', compact('dispatcherCount','truckCount','availableTrucks'));
    }
}
