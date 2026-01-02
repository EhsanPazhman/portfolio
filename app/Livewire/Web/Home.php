<?php

namespace App\Livewire\Web;

use App\Models\User;
use App\Livewire\Web\BaseComponent;

class Home extends BaseComponent
{
    public $owner;
    public function render()
    {
        $this->owner = User::where('role', 'Admin')->firstOrFail();
        return view('livewire.web.home');
    }
}
