<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Warranty;


class CarProperty extends Model
{
    use HasFactory;

    protected $fillable =[
        'name_ar',
        'name_en'
    ];
    

    public function  warrenties(){
        return $this->hasMany(Warranty::class);
    }

}
