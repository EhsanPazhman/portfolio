<?php

namespace App\Livewire\Web;

use App\Models\User;
use App\Livewire\Web\BaseComponent;

class Contact extends BaseComponent
{
    public $owner;
    public function render()
    {
        $this->owner = User::where('role', 'admin')
            ->with([
                'profile.socialLinks'
            ])->firstOrFail();
        return view('livewire.web.contact');
    }
}
