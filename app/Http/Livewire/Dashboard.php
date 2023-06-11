<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shipment;
use App\Models\TrackingInfo;

class Dashboard extends Component
{
    public $latestShipments;
    public $totalCreatedShipments;
    public $totalDeliveredShipments;
    public $totalUndeliveredShipments;

    public function mount()
    {
        $this->totalCreatedShipments     = Shipment::count();
        $this->totalDeliveredShipments   = TrackingInfo::where('status', 'delivered')->count();
        $this->totalUndeliveredShipments = Shipment::whereDoesntHave('trackingInfo', function ($query) {
            $query->where('status', 'delivered');
        })->count();
        $this->latestShipments = Shipment::with(['trackingInfo' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
