<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shipment;

class TrackingComponent extends Component
{
    public $shipment;

    public function mount(Shipment $shipment)
    {
        $this->shipment = $shipment;
    }

    public function render()
    {
        return view('livewire.tracking-component');
    }
}
