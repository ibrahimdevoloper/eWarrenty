<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\CarType;
use App\Models\CarProperty;
use App\Models\User;
use App\Models\Battery;

class Warranty extends Model
{
    use HasFactory;

    protected $fillable = [
        'battery_serial_number',
        'bought_date',
        'car_number',
        'car_number_image',
        'battery_front_image',
        'fixed_battery_image',
        'battery_model_id',
        'car_property_id',
        'car_type_id',
        "warranty_code",
        "customer_phone_number",
        "customer_address",
        "customer_email",
        "customer_name",
        "notes",
        'market_id',
    ];


    public function  carType(){
        return $this->belongsTo(CarType::class);
    }

    public function  carProperty(){
        return $this->belongsTo(CarProperty::class);
    }

    public function  user(){
        return $this->belongsTo(User::class);
    }

    public function  battery(){
        return $this->belongsTo(Battery::class);
    }

}
