<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

/**
 * Abstract Class AdminComponent
 * 
 * Base class for all administrative Livewire components.
 * Handles authentication, role authorization, and shared profile context.
 */
#[Layout('layouts.admin')]
abstract class AdminComponent extends Component
{
    /** @var int|null The ID of the authenticated administrator's profile */
    public $profile_id;

    /**
     * Initializes the administrative context.
     * Verifies authentication, validates 'admin' role, and retrieves profile link.
     * 
     * @return void
     */
    public function mount()
    {
        // 1. Ensure user is authenticated and is an admin
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized access. Admin privileges required.');
        }

        // 2. Fetch the profile associated with the authenticated admin
        $profile = Auth::user()->profile;

        if (!$profile) {
            abort(404, 'Administrative profile not found. Please contact support.');
        }

        $this->profile_id = $profile->id;

        // 3. Trigger child initialization if the method exists
        if (method_exists($this, 'init')) {
            $this->init();
        }
    }

    /**
     * Optional: Global Admin Error Handler
     * Dispatches a notification to the frontend.
     */
    protected function notifyError(string $message)
    {
        $this->dispatch('notify', [
            'type' => 'error',
            'message' => $message
        ]);
    }
}
