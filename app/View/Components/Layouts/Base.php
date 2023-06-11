<?php

namespace App\View\Components\Layouts;

use App\Models\Setting;
use Illuminate\View\Component;

class Base extends Component
{
    public $siteName;
    public $siteDescription;
    public $siteKeywords;
    public $siteLogo;
    public $siteFavicon;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->fetchSettings();
    }
    public function fetchSettings()
    {
        $settings = Setting::first();

        if ($settings) {
            $this->siteName         = $settings->site_name;
            $this->siteDescription  = $settings->site_description;
            $this->siteKeywords     = $settings->keyword;
            $this->siteLogo         = $settings->site_logo;
            $this->siteFavicon      = $settings->site_icon;
        }
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.base');
    }
}
