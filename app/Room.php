<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'code', 'name', 'description'
    ];

    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'description' => 'string'
    ];
}
