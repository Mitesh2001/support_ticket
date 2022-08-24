<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'type',
        'quantity',
        'barcode_scan',
        'external_id'
    ];

    public function ridf()
    {
        return $this->hasMany(RIDF::class);
    }
}
