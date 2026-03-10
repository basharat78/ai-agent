<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dispatcher extends Model
{
    protected $fillable = [
        'name',
        'email',
        'role',
        'openphone_number',
        'openphone_user_id',
        'is_active',
    ];
        protected $casts = [   // Cast 'is_active' to boolean for proper handling in the application
        'is_active' => 'boolean',
    ];
   public function trucks() : HasMany
   {
    return $this->hasMany(Truck::class);
   }
}
