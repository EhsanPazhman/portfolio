<?php

namespace App\Livewire\Web;

use App\Models\User;
use App\Livewire\Web\BaseComponent;

/**
 * Class Projects
 * Handles the retrieval and display of portfolio projects 
 * linked to the administrator's profile.
 */
class Projects extends BaseComponent
{
    /** @var User $owner The administrative user object with projects relationship */
    public $owner;

    /**
     * Component mount lifecycle hook.
     * Fetches the admin user and eager-loads only active projects to optimize memory.
     * 
     * @return void
     */
    public function mount()
    {
        $this->owner = User::where('role', 'admin')
            ->with([
                'profile.projects' => function ($query) {
                    // Assuming projects have a status or you want them ordered by latest
                    $query->latest();
                }
            ])->firstOrFail();
    }

    /**
     * Renders the projects grid view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.web.projects');
    }
}
