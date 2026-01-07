<?php

namespace App\Livewire\Web;

use App\Models\User;
use App\Livewire\Web\BaseComponent;

/**
 * Class About
 * Responsible for displaying personal skills, technologies, 
 * and a summary of professional experience.
 */
class About extends BaseComponent
{
    /** @var User $owner The administrator user instance with profile relations */
    public $owner;

    /**
     * Component lifecycle hook.
     * Eager loads profile relationships to minimize database queries (N+1 problem).
     * 
     * @return void
     */
    public function mount()
    {
        $this->owner = User::where('role', 'admin')
            ->with([
                'profile.skills',
                'profile.technologies',
                'profile.experiences'
            ])->firstOrFail();
    }

    /**
     * Renders the about section view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.web.about');
    }
}
