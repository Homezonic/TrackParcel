<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function search(Request $request)
    {
        $trackingNumber = $request->input('trackingNumber');

        // Perform the search logic
        // $shipment = Shipment::with('trackingInfo')->where('tracking_id', $trackingNumber)->first();
        $shipment = Shipment::with(['trackingInfo' => function ($query) {
            $query->orderBy('date', 'desc');
        }])->where('tracking_id', $trackingNumber)->first();

        if ($shipment) {
            // Shipment found, extract the details
            $trackingInfo = [
                'tracking_number'  => $shipment->tracking_id,
                'shipper_name'     => $shipment->shipper_name,
                'shipper_country'  => $shipment->shipper_country,
                'shipper_state'    => $shipment->shipper_state,
                'shipper_city'     => $shipment->shipper_city,
                'package_type'     => $shipment->package_type,
                'receiver_name'    => $shipment->receiver_name,
                'receiver_country' => $shipment->receiver_country,
                'receiver_state'   => $shipment->receiver_state,
                'tracking_info'    => $shipment->trackingInfo,
            ];

            // Pass the trackingInfo to the trackresult view
            return view('livewire.home.trackresult', compact('trackingInfo'));
        } else {
            // Shipment not found
            return redirect()->back()->with('error', 'No Tracking Record found! Please try again!');
        }
    }
}
