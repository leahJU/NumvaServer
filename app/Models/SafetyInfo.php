<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SafetyInfo extends Model
{
    use HasFactory;

    protected $table = 'safety_infos';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user() 
    {
        return $this->hasOne('User', 'user_id');
    }
}
