<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;


class Religion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
    ];
    public function users(){
        return $this->hasMany(User::class);
    }
}
