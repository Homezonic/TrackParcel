<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function index()
    {
        return view('contact-us');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'email'       => 'required|email',
            'phone'       => 'required',
            'formmessage' => 'required',
        ]);

        $name        = $request->input('name');
        $email       = $request->input('email');
        $phone       = $request->input('phone');
        $formmessage = $request->input('formmessage');

        // Get recipient email from settings table
        $recipientEmail = Setting::value('site_email');
        if ($recipientEmail) {
            // Send email
            Mail::to($recipientEmail)->send(new ContactFormMail($name, $email, $phone, $formmessage));

            return redirect()->back()->with('success', 'Thank you for your message! We will get back to you shortly');
        } else {
            return redirect()->back()->with('error', 'Recipient email not active. Please contact the website administrator.');
        }
    }
}
