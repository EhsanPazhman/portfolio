<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.admin')]
abstract class AdminComponent extends Component
{
    public $profile_id;

    public function mount()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized access.');
        }

        $this->profile_id = Auth::id();

        if (method_exists($this, 'init')) {
            $this->init();
        }
    }
}
