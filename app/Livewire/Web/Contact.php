<?php

namespace App\Livewire\Web;

use App\Models\User;
use Livewire\Attributes\Rule;
use App\Livewire\Web\BaseComponent;
use Illuminate\Support\Facades\Log;
use App\Models\Contact as ContactModel;

/**
 * Class Contact
 * Handles the contact form submission and displays owner's social information.
 */
class Contact extends BaseComponent
{
    /** @var User $owner The administrator instance for contact details */
    public $owner;

    #[Rule('required|min:3', message: 'Please enter your full name.')]
    public $name;

    #[Rule('required|email', message: 'A valid email address is required.')]
    public $email;

    #[Rule('nullable|min:5')]
    public $subject;

    #[Rule('required|min:10', message: 'Your message should be at least 10 characters long.')]
    public $message;

    /**
     * Initializes component and eager loads social links to prevent N+1 issues.
     * 
     * @return void
     */
    public function mount()
    {
        $this->owner = User::where('role', 'admin')
            ->with(['profile.socialLinks'])
            ->firstOrFail();
    }

    /**
     * Validates and persists the contact message to the database.
     * Dispatches browser events for frontend notifications.
     * 
     * @return void
     */
    public function sendMessage()
    {
        $validated = $this->validate();

        try {
            ContactModel::create($validated);

            $this->reset(['name', 'email', 'subject', 'message']);

            // Dispatching global notification event
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => 'Message sent successfully!'
            ]);
        } catch (\Exception $e) {
            Log::error('Front Contact Submission Error: ' . $e->getMessage());

            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'Something went wrong. Please try again later.'
            ]);
        }
    }

    /**
     * Renders the contact form view.
     * 
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.web.contact');
    }
}
