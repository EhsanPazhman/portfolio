<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Projects extends Component
{
    public $owner;
    public function render()
    {
        $this->owner = User::where('role', 'admin')
            ->with([
                'profile.projects'
            ])->firstOrFail();
        return view('livewire.projects')->layout('layouts.app');
    }
}
