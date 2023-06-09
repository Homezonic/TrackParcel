<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shipment;
use Livewire\WithPagination;

class AllShipments extends Component
{
    use WithPagination;
    protected $shipments;
    public $perPage = 5;

    public $showDemoNotification    = false;
    public $showSuccesNotification  = false;
    public $confirmingDelete        = false;
    public $shipmentToDelete;

    public function confirmDelete($id)
    {
        $this->shipmentToDelete = Shipment::findOrFail($id);
        $this->confirmingDelete = true;
    }

    public function deleteShipment()
    {
        $this->shipmentToDelete->delete();
        $this->confirmingDelete       = false;
        session()->flash('success', 'Shipment deleted successfully.');
        return redirect()->route('all-shipments');
    }

    public function cancelDelete()
    {
        $this->confirmingDelete = false;
    }

    public function mount()
    {
        $shipments = Shipment::paginate($this->perPage);
    }
    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $shipments = Shipment::paginate($this->perPage);

        return view('livewire.all-shipments', [
            'shipments' => $shipments,
        ]);
    }
}
