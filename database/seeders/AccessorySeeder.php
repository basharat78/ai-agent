<?php

namespace Database\Seeders;

use App\Models\Accessory;
use Illuminate\Database\Seeder;

class AccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accessories = [
            ['name' => 'Liftgate', 'description' => 'A hydraulic platform on the back of a truck for loading/unloading.'],
            ['name' => 'Tarps', 'description' => 'Heavy-duty waterproof sheets used to cover flatbed loads.'],
            ['name' => 'E-Track', 'description' => 'A system of rails for securing cargo inside a dry van.'],
            ['name' => 'Logistics Posts', 'description' => 'Vertical posts for securing cargo.'],
            ['name' => 'Load Bars', 'description' => 'Bars used to prevent cargo from shifting.'],
            ['name' => 'Straps', 'description' => 'Webbing straps for securing cargo.'],
            ['name' => 'Chains', 'description' => 'Heavy-duty chains for securing heavy flatbed loads.'],
            ['name' => 'Bungies', 'description' => 'Elastic cords for securing tarps.'],
        ];

        foreach ($accessories as $accessory) {
            Accessory::updateOrCreate(['name' => $accessory['name']], $accessory);
        }
    }
}
