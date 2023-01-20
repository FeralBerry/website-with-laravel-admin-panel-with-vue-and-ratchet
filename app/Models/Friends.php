<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    protected $table = 'friends';
    protected $fillable = [
        'id',
        'user_id',
        'friend_id',
        'created_at',
        'updated_at',
    ];
}
