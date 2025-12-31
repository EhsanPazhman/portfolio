<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Home extends Component
{
    public $owner;
    public function render()
    {
        $this->owner = User::where('role', 'Admin')->firstOrFail();
        return view('livewire.home')->layout('layouts.app');
    }
}
