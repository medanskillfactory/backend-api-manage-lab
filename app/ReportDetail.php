<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportDetail extends Model
{
    protected $fillable = [
        'report_id', 'item_id', 'status', 'note'
    ];

    protected $casts = [
        'report_id' => 'integer',
        'item_id' => 'integer',
        'status' => 'string',
        'note' => 'string'
    ];
}
