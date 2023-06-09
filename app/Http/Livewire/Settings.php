<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class Settings extends Component
{
    public $settings;

    public function mount()
    {
        $this->settings = Setting::firstOrFail();
    }

    public function updateSettings()
    {
        $this->validate([
            'settings.site_name'        => 'required',
            'settings.site_description' => 'nullable',
            // Add validation rules for other fields
        ]);

        $this->settings->save();

        session()->flash('success', 'Settings updated successfully.');
    }

    public function render()
    {
        return view('livewire.settings');
    }
}
