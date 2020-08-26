<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'room_id', 'code', 'name', 'brand', 'purchase_year', 'is_include_pc', 'is_include_monitor', 'is_include_keyboard', 'is_include_headset', 'origin', 'acceptance_year', 'quantity'
    ];

    protected $casts = [
        'room_id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'brand' => 'string',
        'purchase_year' => 'string',
        'is_include_pc' => 'boolean',
        'is_include_monitor' => 'boolean',
        'is_include_keyboard' => 'boolean',
        'is_include_headset' => 'boolean',
        'origin' => 'string',
        'acceptance_year' => 'string',
        'quantity' => 'integer'
    ];

    public function room()
    {
        return $this->belongsto('App\Room', 'room_id');
    }
}
