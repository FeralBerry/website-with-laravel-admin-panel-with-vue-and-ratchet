<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FriendsAdd extends Model
{
    protected $table = 'friends_add';
    protected $fillable = [
        'id',
        'user_id',
        'friend_id',
        'created_at',
        'updated_at',
    ];
}
