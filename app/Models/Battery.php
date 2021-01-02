<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ManufacturingCountry;
use App\Models\Terminal;
use App\Models\Warranty;


class Battery extends Model
{
    use HasFactory;

    protected $table="batteries";

    protected $fillable =[
        'number',
        'info',
        'capacity',
        'cca_ampere',
        'weight',
        'terminal_id',
        'dimensions',
        'description',
        'manufacturing_country_id',
        'image',//battery preview image
        'front_image',//example on how to take a picture of the battery
        'serial_number_image',// where to find serial number
    ];

    public function setTerminalAttribute($value)
    {
        $this->attributes['terminal'] = Terminal::findOrFail($value)->name;
        unset($this->attributes['terminal_id']);
    }
    public function setManufacturingCountryAttribute($value)
    {
        $this->attributes['manufacturing_country_ar'] = ManufacturingCountry::findOrFail($value)->name_ar;
        $this->attributes['manufacturing_country_en'] = ManufacturingCountry::findOrFail($value)->name_en;
        unset($this->attributes['manufacturing_country_id']);
    }

    public function  manufacturingCountry(){
        return $this->belongsTo(ManufacturingCountry::class);
    }

    public function  terminal(){
        return $this->belongsTo(Terminal::class);
    }

    public function  warrenties(){
        return $this->hasMany(Warranty::class);
    }

}
