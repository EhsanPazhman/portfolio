<?php

namespace App\Livewire\Web;

use App\Models\User;
use App\Livewire\Web\BaseComponent;

class About extends BaseComponent
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
        return view('livewire.web.about');
    }
}
