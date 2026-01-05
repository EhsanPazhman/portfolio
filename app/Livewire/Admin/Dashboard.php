<?php

namespace App\Livewire\Admin;

use App\Models\Project;
use App\Models\Contact;
use App\Models\Skill;

class Dashboard extends AdminComponent
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'totalProjects' => Project::where('profile_id', $this->profile_id)->count(),

            'totalMessages' => Contact::count(),

            'totalSkills'   => Skill::where('profile_id', $this->profile_id)->count(),

            'recentMessages' => Contact::latest()
                ->take(5)
                ->get(),
        ]);
    }
}
