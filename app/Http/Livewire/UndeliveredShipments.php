<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shipment;
use Livewire\WithPagination;

class UndeliveredShipments extends Component
{
    use WithPagination;
    protected $shipments;

    public $perPage = 10;

    public function updatingPerPage()
    {
        $this->resetPage();
    }
    public function mount()
    {
        $this->shipments = Shipment::whereNotIn('id', function ($query) {
            $query->select('shipment_id')
                ->from('tracking_info')
                ->where('status', 'Delivered')
                ->groupBy('shipment_id');
        })->paginate($this->perPage);
    }
    public function render()
    {
        $this->shipments = Shipment::whereNotIn('id', function ($query) {
            $query->select('shipment_id')
                ->from('tracking_info')
                ->where('status', 'Delivered')
                ->groupBy('shipment_id');
        })->paginate($this->perPage);

        return view('livewire.undelivered-shipments', [
            'shipments' => $this->shipments,
        ]);
    }
}
