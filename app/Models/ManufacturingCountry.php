<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Battery;


class ManufacturingCountry extends Model
{
    use HasFactory;

    protected $fillable=[
        'name_ar',
        'name_en'
    ];

    
    public function  batteries(){
        return $this->hasMany(Battery::class);
    }

}
