<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;

    public $settings;
    public $logo;
    public $icon;
    public $showDemoNotification   = false;

    protected $rules = [
        'settings.tracking_initials' => 'nullable',
        'settings.tracking_numbers'  => 'required|integer',
        'settings.site_name'         => 'required|string',
        'settings.site_description'  => 'nullable|string',
        'logo'                       => 'nullable|image|max:1024',
        'icon'                       => 'nullable|image|max:1024|dimensions:min_width=250,min_height=250,max_width=512,max_height=512',
        'settings.site_email'        => 'nullable|email',
        'settings.tawkto_id'         => 'nullable|string',
    ];

    public function mount()
    {
        $this->settings = Setting::firstOrFail();
    }

    public function save()
    {
        $this->validate();

        if ($this->logo) {
            $logoPath                  = $this->logo->store('public/logos');
            $this->settings->site_logo = $logoPath;
        }

        if ($this->icon) {
            $iconPath                  = $this->icon->store('public/icons');
            $this->settings->site_icon = $iconPath;
        }

        $this->settings->save();

        $this->emit('saved');

        session()->flash('success', 'Settings saved successfully.');
    }

    public function render()
    {
        return view('livewire.settings');
    }
}
