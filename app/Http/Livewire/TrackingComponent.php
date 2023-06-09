<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shipment;
use App\Models\TrackingInfo;

class TrackingComponent extends Component
{
    public $showSuccesNotification = false;
    public $showDemoNotification   = false;
    public $shipment;
    public $status;
    public $details;
    public $location;
    public $date;

    public function mount($shipmentId)
    {
        $this->shipment = Shipment::findOrFail($shipmentId);
    }

    public function saveTrackingInfo()
    {
        $this->validate([
            'status'     => 'required',
            'details'    => 'required',
            'location'   => 'required',
            'date'       => 'required',
        ]);

        TrackingInfo::create([
            'shipment_id' => $this->shipment->id,
            'status'      => $this->status,
            'details'     => $this->details,
            'location'    => $this->location,
            'date'        => $this->date,
        ]);

        $this->resetForm();
        $this->showSuccesNotification = true;
    }

    public function resetForm()
    {
        $this->status     = '';
        $this->details    = '';
        $this->location   = '';
        $this->date       = '';
    }

    public function render()
    {
        $trackingInfos = TrackingInfo::where('shipment_id', $this->shipment->id)->get();

        return view('livewire.tracking-component', [
            'trackingInfos' => $trackingInfos,
        ]);
    }
}
