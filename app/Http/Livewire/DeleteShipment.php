<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shipment;

class DeleteShipment extends Component
{
    public $shipment;

    public function mount($id)
    {
        // Retrieve the shipment by ID
        $this->shipment = Shipment::findOrFail($id);
    }

    public function deleteShipment()
    {
        $this->shipment->delete();
        return redirect()->route('all-shipments')->with($this->showSuccesNotification = true);
    }

    public function render()
    {
        return view('livewire.delete-shipment');
    }
}
