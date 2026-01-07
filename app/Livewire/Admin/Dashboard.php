<?php

namespace App\Livewire\Admin;

use App\Models\Project;
use App\Models\Contact;
use App\Models\Skill;
use Illuminate\View\View;

/**
 * Class Dashboard
 * 
 * Provides an overview of the portfolio system statistics and 
 * recent interactions for the administrator.
 */
class Dashboard extends AdminComponent
{
    /**
     * Renders the administrative dashboard with real-time statistics.
     * 
     * @return View
     */
    public function render(): View
    {
        return view('livewire.admin.dashboard', [
            // Optimized counts restricted to current profile
            'totalProjects' => Project::where('profile_id', $this->profile_id)->count(),

            'totalMessages' => Contact::count(),

            'totalSkills'   => Skill::where('profile_id', $this->profile_id)->count(),

            // Fetching latest 5 messages for the quick-view table
            'recentMessages' => Contact::latest()
                ->take(5)
                ->get(),
        ]);
    }
}
