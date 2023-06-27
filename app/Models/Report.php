<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'report_type_id',
        'report_description'
    ];

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function ReportType()
    {
        return $this->belongsTo('App\Models\ReportType', 'report_type_id');
    }
}
