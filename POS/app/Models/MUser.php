<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MUser extends Model
{
    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    
    protected $fillable = [
        'username',
        'level_id',
        'nama',
        'password'
    ];
}

