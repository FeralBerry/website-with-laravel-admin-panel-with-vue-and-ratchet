<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersRoom extends Model
{
    protected $table = 'users_room';
    protected $fillable = [
        'id',
        'room_id',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
