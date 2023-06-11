<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CustomCode;

class CustomCodeForm extends Component
{
    public $headerCode;
    public $footerCode;
    public $showDemoNotification   = false;

    protected $rules = [
        'headerCode' => 'nullable|string',
        'footerCode' => 'nullable|string',
    ];

    public function mount()
    {
        $customCode = CustomCode::first();
        if ($customCode) {
            $this->headerCode = $customCode->header_code;
            $this->footerCode = $customCode->footer_code;
        }
    }

    public function save()
    {
        if (env('IS_DEMO')) {
            $this->showDemoNotification = true;
        } else {
            $this->validate();
            $customCode              = CustomCode::firstOrCreate([]);
            $customCode->header_code = htmlspecialchars($this->headerCode);
            $customCode->footer_code = htmlspecialchars($this->footerCode);
            $customCode->save();

            session()->flash('success', 'Custom code saved successfully.');
        }
    }

    public function render()
    {
        return view('livewire.custom-code-form');
    }
}
