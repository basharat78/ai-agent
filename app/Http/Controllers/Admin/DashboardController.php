<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CallLog;
use App\Models\Dispatcher;
use App\Models\LoadMatch;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
       
        return view('admin.dashboard.index');
    }
}
