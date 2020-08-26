<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeReport extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string'
    ];
}
