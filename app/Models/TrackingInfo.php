<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrackingInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'shipment_id',
        'tracking_number',
        'label_status',
    ];
    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
