<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public $fillable = [
        'date',
        'instruction',
        'assign',
        'status',
        'task_id',
        'external_id'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class,'task_id');
    }

    public function jobSubmit()
    {
        return $this->hasOne(JobSubmit::class);
    }

    public function status_track()
    {
        return $this->morphMany(StatusTrack::class,'status_trackable');
    }

    public function asignee()
    {
        return $this->belongsTo(User::class,'assign','id');
    }

}
