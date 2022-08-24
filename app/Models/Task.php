<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public $fillable = [
        'type_id',
        'name',
        'complain_details',
        'client_id',
        'status',
        'external_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, "client_id");
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function inwards()
    {
        return $this->hasMany(Inward::class,'task_id');
    }

    public function status_track()
    {
        return $this->morphMany(StatusTrack::class,'status_trackable');
    }

    public function taskType()
    {
        return $this->hasOne(TaskType::class,'id','type_id');
    }

}
