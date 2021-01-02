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

    protected $table="battaries";

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
        'image',
        'front_image',
        'serial_number_image',
    ];

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
