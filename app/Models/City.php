<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $fillable = ['name','state_id'];

    public function state()
    {
        $this->belongsTo(State::class,'state_id');
    }
}
