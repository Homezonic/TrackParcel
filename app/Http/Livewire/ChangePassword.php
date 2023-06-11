<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
    public $oldPassword;
    public $newPassword;
    public $confirmPassword;
    public $showDemoNotification   = false;

    protected $rules = [
        'oldPassword'     => 'required',
        'newPassword'     => 'required|min:8',
        'confirmPassword' => 'required|same:newPassword',
    ];
    public function changePassword()
    {
        if (env('IS_DEMO')) {
            $this->showDemoNotification = true;
        } else {
            $this->validate();

            $user = Auth::user();

            if (Hash::check($this->oldPassword, $user->password)) {
                $user->password = Hash::make($this->newPassword);
                $user->save();

                session()->flash('success', 'Password changed successfully.');
                $this->resetForm();
            } else {
                session()->flash('error', 'Invalid old password.');
            }
        }
    }

    private function resetForm()
    {
        $this->oldPassword     = '';
        $this->newPassword     = '';
        $this->confirmPassword = '';
    }

    public function render()
    {
        return view('livewire.change-password');
    }
}
