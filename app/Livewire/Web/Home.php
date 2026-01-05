<?php

namespace App\Livewire\Web;

use App\Models\User;
use App\Livewire\Web\BaseComponent;

class Home extends BaseComponent
{
    public $owner;
    public function mount()
    {
        $this->owner = User::where('email', 'ehsanpazhman@gmail.com')
            ->where('role', 'admin')
            ->with('profile')
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.web.home');
    }
}
