<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'type_report_id', 'created_by', 'date', 'note'
    ];

    protected $casts = [
        'type_report_id' => 'integer',
        'created_by' => 'integer',
        'date' => 'date',
        'note' => 'string'
    ];

    public function reportDetail()
    {
        return $this->hasMany('App\ReportDetail', 'report_id');
    }

    public function typeReport()
    {
        return $this->belongsto('App\TypeReport', 'type_report_id');
    }

    public function createdBy()
    {
        return $this->belongsto('App\User', 'created_by');
    }
}
