<?php

namespace App\Livewire\Web;

use App\Models\User;
use App\Livewire\Web\BaseComponent;

/**
 * Class Experiences
 * Manages the professional timeline and work history display.
 */
class Experiences extends BaseComponent
{
    /** @var User $owner Administrative user with loaded professional experiences */
    public $owner;

    /**
     * Initializes the component by fetching the admin and their experiences.
     * Experiences are sorted by start date in descending order by default.
     * 
     * @return void
     */
    public function mount()
    {
        $this->owner = User::where('role', 'admin')
            ->with([
                'profile.experiences' => function ($query) {
                    $query->orderBy('start_date', 'desc');
                }
            ])->firstOrFail();
    }

    /**
     * Renders the experience timeline view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.web.experiences');
    }
}
