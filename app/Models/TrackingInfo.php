<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrackingInfo extends Model
{
    use HasFactory;
    protected $table    = 'tracking_info';
    protected $fillable = ['shipment_id', 'status', 'details', 'location', 'date'];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
