<?php

namespace App\Livewire\Web;

use App\Models\User;
use App\Livewire\Web\BaseComponent;

class Experiences extends BaseComponent
{
    public $owner;
    public function render()
    {
        $this->owner = User::where('role', 'admin')
            ->with([
                'profile.experiences'
            ])->firstOrFail();
        return view('livewire.web.experiences');
    }
}
