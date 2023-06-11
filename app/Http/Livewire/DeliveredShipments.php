<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shipment;
use Livewire\WithPagination;

class DeliveredShipments extends Component
{
    use WithPagination;

    public $perPage = 10;

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $shipments = Shipment::join('tracking_info', 'shipments.id', '=', 'tracking_info.shipment_id')
            ->where('tracking_info.status', '=', 'Delivered')
            ->paginate($this->perPage);

        return view('livewire.delivered-shipments', [
            'shipments' => $shipments,
        ]);
    }
}
