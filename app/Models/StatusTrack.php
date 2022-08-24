<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTrack extends Model
{
    use HasFactory;

    public function status_trackable()
    {
        return $this->morphTo();
    }
}
