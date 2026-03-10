<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Truck extends Model
{
  protected $fillable = [
        'dispatcher_id',
        'truck_number',
        'driver_name',
        'driver_phone',
        'equipment_type',
        'current_location',
        'current_lat',
        'current_lng',
        'available_from',
        'status',
        'max_weight',
  ];

    public function dispatcher(): BelongsTo
    {
        return $this->belongsTo(Dispatcher::class);
    }

}
