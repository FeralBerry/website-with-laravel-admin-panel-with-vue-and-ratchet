<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = 'seo';
    protected $fillable = [
        'id',
        'name',
        'url',
        'content',
        'created_at',
        'updated_at',
    ];
}
