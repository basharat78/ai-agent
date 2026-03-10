<?php

namespace Database\Seeders;

use App\Models\Accessory;
use App\Models\Dispatcher;
use App\Models\Load;
use App\Models\LoadMatch;
use App\Models\Truck;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Ensure we have a dispatcher
        $dispatcher = Dispatcher::where('email', 'dispatcher@truckzap.com')->first() ?? Dispatcher::create([
            'name' => 'John Dispatcher',
            'email' => 'dispatcher@truckzap.com',
            // 'password' => bcrypt('password'),
            'role' => 'dispatcher',
            'is_active' => true,
        ]);

        // 2. Create some Trucks
        $truck1 = Truck::updateOrCreate(['truck_number' => 'TZ-101'], [
            'dispatcher_id' => $dispatcher->id,
            'driver_name' => 'Dave Miller',
            'driver_phone' => '555-0101',
            'equipment_type' => 'dry_van',
            'max_weight' => 45000,
            'status' => 'available',
            'current_location' => 'Chicago, IL',
            'available_from' => now(),
        ]);

        $truck2 = Truck::updateOrCreate(['truck_number' => 'TZ-202'], [
            'dispatcher_id' => $dispatcher->id,
            'driver_name' => 'Sarah Smith',
            'driver_phone' => '555-0202',
            'equipment_type' => 'flatbed',
            'max_weight' => 48000,
            'status' => 'available',
            'current_location' => 'Dallas, TX',
            'available_from' => now()->addDays(1),
        ]);

        $truck3 = Truck::updateOrCreate(['truck_number' => 'TZ-303'], [
            'dispatcher_id' => $dispatcher->id,
            'driver_name' => 'Mike Ross',
            'driver_phone' => '555-0303',
            'equipment_type' => 'reefer',
            'max_weight' => 44000,
            'status' => 'available',
            'current_location' => 'Atlanta, GA',
            'available_from' => now(),
        ]);

        // Assign accessories
        $liftgate = Accessory::where('name', 'Liftgate')->first();
        $tarps = Accessory::where('name', 'Tarps')->first();
        $straps = Accessory::where('name', 'Straps')->first();

        if ($liftgate) $truck1->accessories()->syncWithoutDetaching([$liftgate->id]);
        if ($tarps && $straps) $truck2->accessories()->syncWithoutDetaching([$tarps->id, $straps->id]);

        // 4. Create some Loads
       
    }
}
