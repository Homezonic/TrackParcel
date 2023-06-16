<?php

namespace App\View\Components\Layouts;

use App\Models\Setting;
use App\Models\Shipment;
use App\Models\CustomCode;
use Illuminate\View\Component;

class MainApp extends Component
{
    public $trackingNumber;
    public $siteName;
    public $siteDescription;
    public $siteKeywords;
    public $siteLogo;
    public $siteFavicon;
    public $headCode;
    public $footCode;
    public $tawktoId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->fetchSettings();
        // $this->fetchCodes();
    }
    public function fetchSettings()
    {
        $settings   = Setting::first();
        $customCode = CustomCode::first();

        if ($settings) {
            $this->siteName         = $settings->site_name;
            $this->siteDescription  = $settings->site_description;
            $this->siteKeywords     = $settings->keyword;
            $this->siteLogo         = $settings->site_logo;
            $this->siteFavicon      = $settings->site_icon;
            $this->tawktoId         = $settings->tawkto_id;
        }
        if ($customCode) {
            $this->headCode         = $customCode->header_code;
            $this->footCode         = $customCode->footer_code;
        }
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function search()
    {
        // Perform the search logic here
        // Retrieve the shipment details based on the tracking number
        $shipment = Shipment::where('tracking_number', $this->trackingNumber)->first();

        if (!$shipment) {
            // Shipment not found, show an error message
            session()->flash('error', 'Shipment not found');
            return;
        }

        // Shipment found, emit an event to update the tracking view
        $this->emit('shipmentFound', $shipment);
    }
    public function render()
    {
        return view('layouts.main-app');
    }
}
