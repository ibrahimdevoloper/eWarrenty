<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'email',
        'country',
        'address',
        'phone_number',
        'username',
        
    ];

    protected $hidden=[
        'password'
    ];

    // public function  country(){
    //     return $this->belongsTo(Country::class);
    // }

    // public function  religion(){
    //     return $this->belongsTo(Religion::class);
    // }

    // public function  role(){
    //     return $this->belongsTo(Role::class);
    // }

    public function  warrenties(){
        return $this->hasMany(Warranty::class);
    }
}
