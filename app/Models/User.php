<?php

namespace App\Models;

use App\Http\services\DefaultModelAttributesTrait;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Branch;
use App\Models\Coupon;
use App\Models\Vendor;
use App\Models\DeliveryMan;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes ,HasRoles;
    use DefaultModelAttributesTrait;
    const ADMIN = 1;
    const USER = 2;

    protected $folder='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [''];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute($val){
        return $val;
    }



    public function notifications(){
        return $this->hasMany(Notification::class);
    }

    public function scopeFilter($query,$filter){
        $query->where('name','like','%'.$filter.'%')
            ->orWhere('phone','like','%'.$filter.'%')
            ->orWhere('email','like','%'.$filter.'%')
            ->orWhere('address','like','%'.$filter.'%');
    }

    public function selecetFolder($type){
        switch ($type){
            case $type == self::ADMIN:
                return '/admins/';
                break;
            default:
                return '/users/';
        }
    }

    public function getImageAttribute($value){
        if (!$value){
            return asset('dashboardAssets/images/default_user.jpeg');
        }
        return asset('dashboardAssets/images/users'.$this->selecetFolder($this->type).$value);
    }
}
