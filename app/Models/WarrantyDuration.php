<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarrantyDuration extends Model
{
    use HasFactory;

    protected $fillable = [
        'battery_id',
        'car_property_id',
        'duration',
    ];

    public function  battery(){
        return $this->belongsTo(Battery::class);
    }

    public function  carProperty(){
        return $this->belongsTo(CarProperty::class);
    }

   

}
