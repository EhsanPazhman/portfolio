<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class About extends Component
{
    public $owner;
    public function render()
    {
        $this->owner = User::where('role', 'admin')
            ->with([
                'profile.skills',
                'profile.technologies',
                'profile.experiences'
            ])->firstOrFail();
        return view('livewire.about')->layout('layouts.app');
    }
}
