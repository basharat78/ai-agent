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
          // 4. Create some Loads
        $load1 = Load::updateOrCreate(['source' => 'truckstop', 'external_id' => 'TS-001'], [
            'broker_name' => 'Swift Logistics',
            'broker_phone' => '800-111-2222',
            'origin_city' => 'Chicago',
            'origin_state' => 'IL',
            'destination_city' => 'Detroit',
            'destination_state' => 'MI',
            'equipment_type' => 'dry_van',
            'weight' => 42000,
            'rate' => 1200,
            'rate_per_mile' => 4.25,
            'distance_miles' => 282,
            'pickup_date' => now()->addDays(1),
            'status' => 'matched',
            'ai_score' => 95,
        ]);

        $load2 = Load::updateOrCreate(['source' => 'dat', 'external_id' => 'DAT-002'], [
            'broker_name' => 'TQL',
            'broker_phone' => '800-333-4444',
            'origin_city' => 'Houston',
            'origin_state' => 'TX',
            'destination_city' => 'Dallas',
            'destination_state' => 'TX',
            'equipment_type' => 'flatbed',
            'weight' => 46000,
            'rate' => 850,
            'rate_per_mile' => 3.40,
            'distance_miles' => 250,
            'pickup_date' => now()->addDays(2),
            'status' => 'matched',
            'ai_score' => 88,
        ]);

        $load3 = Load::updateOrCreate(['source' => 'truckstop', 'external_id' => 'TS-003'], [
            'broker_name' => 'CH Robinson',
            'broker_phone' => '800-555-6666',
            'origin_city' => 'Savannah',
            'origin_state' => 'GA',
            'destination_city' => 'Atlanta',
            'destination_state' => 'GA',
            'equipment_type' => 'reefer',
            'weight' => 40000,
            'rate' => 950,
            'rate_per_mile' => 3.80,
            'distance_miles' => 250,
            'pickup_date' => now(),
            'status' => 'matched',
            'ai_score' => 92,
        ]);
           // 5. Create some Load Matches
        LoadMatch::updateOrCreate(['load_id' => $load1->id, 'truck_id' => $truck1->id], [
            'dispatcher_id' => $dispatcher->id,
            'match_score' => 95,
            'match_reason' => 'Excellent match! The truck is currently in Chicago (same city as pickup), reducing deadhead to zero. Equipment types align perfectly, and the rate of $4.25/mile is highly profitable for a 282-mile trip.',
            'status' => 'pending',
        ]);

        LoadMatch::updateOrCreate(['load_id' => $load2->id, 'truck_id' => $truck2->id], [
            'dispatcher_id' => $dispatcher->id,
            'match_score' => 88,
            'match_reason' => 'Strong match. Truck is in Dallas and load is in Houston (approx 240 miles deadhead). Equipment matches (Flatbed) and the weight is within limit. Profitability is solid at $3.40/mile.',
            'status' => 'pending',
        ]);

        LoadMatch::updateOrCreate(['load_id' => $load3->id, 'truck_id' => $truck3->id], [
            'dispatcher_id' => $dispatcher->id,
            'match_score' => 92,
            'match_reason' => 'High quality match. Reefer equipment aligns, location in Atlanta is perfect for this Georgia-based regional run. Weight is manageable and the rate per mile is excellent for the distance.',
            'status' => 'confirmed',
        ]);
    }
}
