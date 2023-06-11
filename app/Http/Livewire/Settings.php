<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Settings extends Component
{
    use WithFileUploads;

    public $settings;
    public $logo;
    public $icon;
    public $showDemoNotification   = false;

    protected $rules = [
        'settings.tracking_initials'                   => 'nullable',
        'settings.tracking_numbers'                    => 'required|integer',
        'settings.site_name'                           => 'required|string',
        'settings.site_description'                    => 'nullable|string',
        'settings.keyword'                             => 'required|string|max:255',
        'logo'                                         => 'nullable|image|max:1024',
        'icon'                                         => 'nullable|image|max:1024|dimensions:min_width=150,min_height=150,max_width=512,max_height=512',
        'settings.site_email'                          => 'nullable|email',
        'settings.tawkto_id'                           => 'nullable|string',
    ];

    public function mount()
    {
        $this->settings = Setting::firstOrFail();
    }

    public function save()
    {
        if (env('IS_DEMO')) {
            $this->showDemoNotification = true;
        } else {
            $this->validate();

            if ($this->logo) {
                $logoPath                  = $this->logo->storeAs('public/assets', 'logo.png');
                $this->settings->site_logo = Storage::url($logoPath);

                // Delete the existing logo file if it exists
                if ($this->settings->site_logo) {
                    Storage::delete($this->settings->site_logo);
                }

                $this->settings->site_logo = $logoPath;
            }

            if ($this->icon) {
                $iconPath                  = $this->icon->storeAs('public/assets', 'favicon.png');
                $this->settings->site_icon = Storage::url($iconPath);

                // Delete the existing favicon file if it exists
                if ($this->settings->site_icon) {
                    Storage::delete($this->settings->site_icon);
                }

                $this->settings->site_icon = $iconPath;
            }

            $this->settings->save();
            $this->emit('saved');
            session()->flash('success', 'Settings saved successfully.');
        }
    }

    public function render()
    {
        return view('livewire.settings');
    }
}
