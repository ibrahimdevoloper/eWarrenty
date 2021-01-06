<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\CarType;
use App\Models\CarProperty;
use App\Models\WarrantyDuration;
use App\Models\Battery;
use App\Models\Market;
use Illuminate\Support\Facades\Storage;

class Warranty extends Model
{

    private $storageLink="/storage/";

    use HasFactory;

    protected $fillable = [
        'battery_serial_number',//
        'bought_date',//
        'car_number',//
        'car_number_image',//
        'battery_front_image',//
        'fixed_battery_image',
        'battery_model_id',//
        'car_property_id',//
        'car_type_id',//
        "warranty_code",//
        "customer_phone_number",//
        "customer_country",//
        "customer_address",//
        "customer_email",//
        "customer_name",//
        "notes",//
        'market_id',//
    ];
    

    public function setCarTypeAttribute($value){
        $this->attributes['car_type'] = CarType::findOrFail($value);
        unset($this->attributes['car_type_id']);
    }

    public function setCarPropertyAttribute($value){
        $this->attributes['car_property'] = CarProperty::findOrFail($value);
        unset($this->attributes['car_property_id']);
    }

    public function setBatteryAttribute($value){
        
        $battery=Battery::findOrFail($value);
        // $battery->image=Storage::disk('public')->url($battery->image);
        // $battery->front_image=Storage::disk('public')->url($battery->front_image);
        // $battery->serial_number_image=Storage::disk('public')->url($battery->serial_number_image);

        $battery->image=$this->storageLink.$battery->image;
        $battery->front_image=$this->storageLink.$battery->front_image;
        $battery->serial_number_image=$this->storageLink.$battery->serial_number_image;
        // $this->attributes['battery'] = Battery::findOrFail($value);
        $this->attributes['battery'] = $battery;


        unset($this->attributes['battery_model_id']);
    }

    public function setMarketAttribute($value){
        $this->attributes['market'] = Market::findOrFail($value);
        unset($this->attributes['market_id']);
    }

    public function setWarrantyDurationAttribute($value){
        $this->attributes['warranty_duration'] = WarrantyDuration::findOrFail($value)->duration;
        // unset($this->attributes['market_id']);
        // unset($this->attributes['car_property_id']);
        // unset($this->attributes['battery_model_id']);


    }

    

    public function  carType(){
        return $this->belongsTo(CarType::class);
    }

    public function  carProperty(){
        return $this->belongsTo(CarProperty::class);
    }

    public function  battery(){
        return $this->belongsTo(Battery::class);
    }

    public function  market(){
        return $this->belongsTo(Market::class);
    }

}
