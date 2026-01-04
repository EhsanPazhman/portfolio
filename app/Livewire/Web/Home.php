<?php

namespace App\Livewire\Web;

use App\Models\User;
use App\Livewire\Web\BaseComponent;

class Home extends BaseComponent
{
    public $owner;
    public function mount()
    {
        $this->owner = User::where('role', 'admin')->with('profile')->first();

        if (!$this->owner) {
            abort(404, 'Admin not found');
        }
    }
    public function render()
    {
        $this->owner = User::where('role', 'Admin')->firstOrFail();
        return view('livewire.web.home');
    }
}
