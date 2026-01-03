<?php

namespace App\Livewire\Admin;

use App\Models\Project;
use App\Models\Contact;
use App\Models\Skill;
use App\Models\User;

class Dashboard extends AdminComponent
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'totalProjects' => Project::count(),
            'totalMessages' => Contact::count(),
            'totalSkills'   => Skill::count(),
            'recentMessages' => Contact::latest()->take(5)->get(),
        ]);
    }
}
