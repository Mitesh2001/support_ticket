<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSubmit extends Model
{
    use HasFactory;

    public $fillable = [
        'job_date',
        'dignosys',
        'job_id',
        'action_taken',
        'task_type',
        'is_bike',
        'is_outdoor',
        'total',
        'expensive',
        'image'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class,'job_id');
    }
}
