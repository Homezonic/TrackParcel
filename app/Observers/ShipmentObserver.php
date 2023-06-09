<?php

namespace App\Observers;

use App\Models\Shipment;

class ShipmentObserver
{
    /**
     * Handle the Shipment "created" event.
     */
    public function created(Shipment $shipment): void
    {
        TrackingInfo::create([
            'shipment_id' => $shipment->id,
            'status'      => 'Label Created',
            'details'     => 'Label Created Successfully',
            'location'    => $shipment->sender_state . ', ' . $shipment->sender_country,
            'date'        => now(),
        ]);
    }

    /**
     * Handle the Shipment "updated" event.
     */
    public function updated(Shipment $shipment): void
    {
        //
    }

    /**
     * Handle the Shipment "deleted" event.
     */
    public function deleted(Shipment $shipment): void
    {
        //
    }

    /**
     * Handle the Shipment "restored" event.
     */
    public function restored(Shipment $shipment): void
    {
        //
    }

    /**
     * Handle the Shipment "force deleted" event.
     */
    public function forceDeleted(Shipment $shipment): void
    {
        //
    }
}
