<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RIDF extends Model
{
    use HasFactory;

    public $fillable = [
        'product_id',
        'start_date',
        'end_date',
        'barcode_scan',
        'external_id',
        'inward_id',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(product::class,'product_id');
    }

    public function inward()
    {
        return $this->belongsTo(Inward::class,'inward_id');
    }

    public function status_track()
    {
        return $this->morphMany(StatusTrack::class,'status_trackable');
    }
}
