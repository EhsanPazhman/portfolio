<?php

namespace App\Livewire\Web;

use App\Models\User;
use App\Livewire\Web\BaseComponent;

class SocialSidebar extends BaseComponent
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
        return view('livewire.web.social-sidebar');
    }
}
