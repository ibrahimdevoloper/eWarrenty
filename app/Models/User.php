<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Religion;
use App\Models\Country;
use App\Models\Warranty;
use App\Models\Role;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name_ar',
        'first_name_en',
        'last_name_ar',
        'last_name_en',
        'birthday',
        'email',
        'password',
        'religion_id',
        'country_id',
        'phone_number',
        "role_id"
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function  country(){
        return $this->belongsTo(Country::class);
    }

    public function  religion(){
        return $this->belongsTo(Religion::class);
    }

    public function  role(){
        return $this->belongsTo(Role::class);
    }

    public function  warrenties(){
        return $this->hasMany(Warranty::class);
    }

}
