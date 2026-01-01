<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Contacts extends Component
{
    public function render()
    {
        return view('livewire.admin.contacts')->layout('layouts.admin');
    }
}
