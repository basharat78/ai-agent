<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];
    public function trucks(){
        return $this->belongsToMany(Truck::class,'truck_accessory');
    
    }
}
