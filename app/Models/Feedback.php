<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public $fillable = [
        'client_id',
        'feedback',
        'complaint_type',
        'user_id',
        'external_id',
        'status'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    public function complainTypeDetails()
    {
        return $this->hasOne(ComplainType::class,'id','complaint_type');
    }
}
