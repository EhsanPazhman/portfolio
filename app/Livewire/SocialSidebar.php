<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SocialSidebar extends Component
{
    public $owner;
    public bool $open = false;

    public function toggle()
    {
        $this->open = ! $this->open;
    }
    public function render()
    {
        $this->owner = User::where('role', 'Admin')->firstOrFail();
        return view('livewire.social-sidebar');
    }
}
