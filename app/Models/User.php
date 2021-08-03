<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        //'remember_token',
    ];
  
    public function memo(){
        return $this->hasMany(Memo::class, 'user_id');
    }
    
    public function safety_info(){
        return $this->hasMany(SafetyInfo::class, 'user_id');
    }
    
    public function second_phone(){
        return $this->hasMany(SecondPhone::class, 'user_id');
    }
    
    public function rep_second_phone(){
        return $this->hasMany(SecondPhone::class, 'user_id')->where('isrep','Y');
    }
}
