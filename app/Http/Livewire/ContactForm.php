<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;

    public function render()
    {
        return view('livewire.home.contact-us');
    }

    public function submitForm()
    {
        $this->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required',
        ]);

        // Get recipient email from settings table
        $recipientEmail = Setting::where('key', 'site_email')->value('value');

        if ($recipientEmail) {
            // Send email
            Mail::to($recipientEmail)->send(new ContactFormMail($this->name, $this->email, $this->message));

            session()->flash('success', 'Thank you for your message!');
        } else {
            session()->flash('error', 'Recipient email not found. Please contact the website administrator.');
        }
    }
}
