<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inward extends Model
{
    use HasFactory;

    public $fillable = [
        'mode_of_receive',
        'product_id',
        'product_description',
        'fault',
        'status',
        'task_id',
        'barcode_scan',
        'external_id'
    ];

    public function ridfs()
    {
        return $this->hasMany(RIDF::class,'inward_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class,'task_id');
    }

    public function status_track()
    {
        return $this->morphMany(StatusTrack::class,'status_trackable');
    }

}
