<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;
use App\Models\Shipment;
use PragmaRX\Countries\Package\Countries;

class ShipmentComponent extends Component
{
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

    public function mount()
    {
        $this->user        = auth()->user();
        $this->tracking_id = $this->generateNumber();
        $this->countries   = Countries::all()->pluck('name.common')->toArray();
    }

    public function generateNumber()
    {
        $setting = Setting::first();
        $limit   = $setting->tracking_numbers;
        $prefix  = $setting->tracking_initials;

        $max = intval(pow(10, $limit) - 1);
        $min = intval(pow(10, $limit - 1));

        $number = mt_rand($min, $max);
        return $prefix . strval($number);
    }

    private function resetFields()
    {
        $fields = [
            'tracking_id',
            'shipper_name',
            'shipper_phone_number',
            'shipper_address',
            'shipper_country',
            'shipper_state',
            'shipper_city',
            'shipper_zipcode',
            'receiver_name',
            'receiver_phone_number',
            'receiver_address',
            'receiver_state',
            'receiver_city',
            'receiver_zipcode',
            'receiver_country',
            'package_name',
            'package_type',
            'package_weight',
        ];

        foreach ($fields as $field) {
            $this->$field      = '';
            $this->tracking_id = $this->generateNumber();
        }
    }

    public function createShipment()
    {
        if (env('IS_DEMO')) {
            $this->showDemoNotification = true;
        } else {
            $validatedData = $this->validate();

            $shipment = Shipment::create($validatedData);
            $this->resetFields();
            $this->showSuccesNotification = true;
        }
    }
    public function editShipment($id)
    {
        return redirect()->route('shipments.edit', ['id' => $id]);
    }
    public function render()
    {
        return view('livewire.shipment-component');
    }
}
