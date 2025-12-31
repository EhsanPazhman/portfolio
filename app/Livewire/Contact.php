<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Contact extends Component
{
    public $owner;
    public function render()
    {
        $this->owner = User::where('role', 'admin')
            ->with([
                'profile.socialLinks'
            ])->firstOrFail();
        return view('livewire.contact')->layout('layouts.app');
    }
}
