<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shipment;
use PragmaRX\Countries\Package\Countries;

class EditShipments extends Component
{
    public $shipment;
    public $showSuccesNotification = false;
    public $showDemoNotification   = false;
    public $countries              = [];
    public $tracking_id;
    // Shipper details
    public $shipper_name;
    public $shipper_phone_number;
    public $shipper_address;
    public $shipper_city;
    public $shipper_country;
    public $shipper_state;
    public $shipper_zipcode;
    // Receiver details
    public $receiver_name;
    public $receiver_phone_number;
    public $receiver_address;
    public $receiver_country;
    public $receiver_state;
    public $receiver_city;
    public $receiver_zipcode;
    // Others
    public $package_name;
    public $package_type;
    public $package_weight;
    public $packageTypes = ['Parcel', 'Box', 'Cargo', 'Electronic', 'Grocery'];
    protected function rules()
    {
        return Shipment::rules();
    }
    public function mount($id)
    {
        // Retrieve the shipment by ID
        $this->shipment                      = Shipment::findOrFail($id);
        $this->countries                     = Countries::all()->pluck('name.common')->toArray();
        $this->tracking_id                   = $this->shipment->tracking_id;
        $this->shipper_name                  = $this->shipment->shipper_name;
        $this->shipper_phone_number          = $this->shipment->shipper_phone_number;
        $this->shipper_address               = $this->shipment->shipper_address;
        $this->shipper_city                  = $this->shipment->shipper_city;
        $this->shipper_state                 = $this->shipment->shipper_state;
        $this->shipper_zipcode               = $this->shipment->shipper_zipcode;
        $this->shipper_country               = $this->shipment->shipper_country;
        $this->receiver_name                 = $this->shipment->receiver_name;
        $this->receiver_phone_number         = $this->shipment->receiver_phone_number;
        $this->receiver_address              = $this->shipment->receiver_address;
        $this->receiver_city                 = $this->shipment->receiver_city;
        $this->receiver_state                = $this->shipment->receiver_state;
        $this->receiver_zipcode              = $this->shipment->receiver_zipcode;
        $this->receiver_country              = $this->shipment->receiver_country;
        $this->package_name                  = $this->shipment->package_name;
        $this->package_type                  = $this->shipment->package_type;
        $this->package_weight                = $this->shipment->package_weight;
    }

    public function updateShipment()
    {
        if (env('IS_DEMO')) {
            $this->showDemoNotification = true;
        } else {
            $this->validate();
            $this->shipment->shipper_name          = $this->shipper_name;
            $this->shipment->shipper_phone_number  = $this->shipper_phone_number;
            $this->shipment->shipper_address       = $this->shipper_address;
            $this->shipment->shipper_city          = $this->shipper_city;
            $this->shipment->shipper_state         = $this->shipper_state;
            $this->shipment->shipper_zipcode       = $this->shipper_zipcode;
            $this->shipment->shipper_country       = $this->shipper_country;
            $this->shipment->receiver_name         = $this->receiver_name;
            $this->shipment->receiver_phone_number = $this->receiver_phone_number;
            $this->shipment->receiver_address      = $this->receiver_address;
            $this->shipment->receiver_city         = $this->receiver_city;
            $this->shipment->receiver_state        = $this->receiver_state;
            $this->shipment->receiver_zipcode      = $this->receiver_zipcode;
            $this->shipment->receiver_country      = $this->receiver_country;
            $this->shipment->package_name          = $this->package_name;
            $this->shipment->package_type          = $this->package_type;
            $this->shipment->package_weight        = $this->package_weight;

            $this->shipment->save();
            $this->showSuccesNotification = true;
        }
    }

    public function render()
    {
        return view('livewire.edit-shipments');
    }
}
