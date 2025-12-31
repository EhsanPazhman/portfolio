<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Experiences extends Component
{
    public $owner;
    public function render()
    {
        $this->owner = User::where('role', 'admin')
            ->with([
                'profile.experiences'
            ])->firstOrFail();
        return view('livewire.experiences')->layout('layouts.app');
    }
}
