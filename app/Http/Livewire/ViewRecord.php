<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shipment;
use App\Models\TrackingInfo;

class ViewRecord extends Component
{
    public $shipment;
    public $status;
    public $details;
    public $location;
    public $date;

    public function mount($shipmentId)
    {
        $this->shipment = Shipment::findOrFail($shipmentId);
    }
    public function render()
    {
        $trackingInfos = TrackingInfo::where('shipment_id', $this->shipment->id)->get();

        return view('livewire.view-record', [
            'trackingInfos' => $trackingInfos,
        ]);
    }
}
