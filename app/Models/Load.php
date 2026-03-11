<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
    
    protected $fillable = [
        'source',
        'external_id',
        'broker_name',
        'broker_phone',
        'broker_email',
        'origin_city',
        'origin_state',
        'destination_city',
        'destination_state',
        'origin_lat',
        'origin_lng',
        'pickup_date',
        'equipment_type',
        'weight',
        'rate',
        'rate_per_mile',
        'distance_miles',
        'commodity',
        'ai_score',
        'status',
        'fetched_at',
    ];

    protected $casts = [
        'pickup_date' => 'date',
        'fetched_at' => 'datetime',
    ];
}
