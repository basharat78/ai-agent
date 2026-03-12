<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoadMatch extends Model
{
    protected $fillable = ([
    'load_id',
    'truck_id',
    'dispatcher_id',
    'match_score',
    'match_reason',
    'status',]);
    public function loadDetails(): BelongsTo{
        return $this->belongsTo(Load::class,'load_id');
    }
    public function truck(): BelongsTo{
        return $this->belongsTo(Truck::class);
    
    }
    public function dispatcher(): BelongsTo{
        return $this->belongsTo(Dispatcher::class);
    }

}
