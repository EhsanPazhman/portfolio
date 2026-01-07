<?php

namespace App\Livewire\Web;

use App\Models\User;
use App\Livewire\Web\BaseComponent;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Home
 * Main landing page component responsible for fetching and displaying
 * the site owner's information and integrating sub-components.
 */
class Home extends BaseComponent
{
    /** @var User $owner Public owner data for view access */
    public $owner;

    /**
     * Initializes the component and fetches the admin user profile.
     * Uses firstOrFail to ensure the application has valid data or throws a 404.
     *
     * @return void
     */
    public function mount()
    {
        $this->owner = User::where('email', 'ehsanpazhman@gmail.com')
            ->where('role', 'admin')
            ->with(['profile' => function ($query) {
                $query->where('status', 'active');
            }])
            ->firstOrFail();
    }

    /**
     * Renders the home view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.web.home');
    }
}
