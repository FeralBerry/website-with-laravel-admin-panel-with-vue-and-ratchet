<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table = 'rooms';
    protected $fillable = [
        'id',
        'name',
        'users',
        'user_admin',
        'type',
        'img',
        'created_at',
        'updated_at',
    ];
}
