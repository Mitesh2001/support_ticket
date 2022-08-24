<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $fillable = [
        "first_name",
        "last_name",
        "email",
        "mobile_number",
        "address",
        'state_id',
        "city_id",
        "photo",
        'external_id'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class)->latest();
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class,'client_id');
    }
}
