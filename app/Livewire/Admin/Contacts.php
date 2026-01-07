<?php

namespace App\Livewire\Admin;

use App\Models\Contact;
use App\Traits\HasModal;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Log;

/**
 * Contacts (Inbox) Management Component
 * Optimized for Livewire v3 (2026) with Eager Loading and Computed Properties.
 */
class Contacts extends AdminComponent
{
    use HasModal;

    /** @var Contact|null The currently selected message for viewing */
    public $selected_contact;

    /**
     * Get all incoming messages sorted by latest.
     * Cached within the request lifecycle via #[Computed].
     */
    #[Computed]
    public function messages()
    {
        return Contact::latest()->get();
    }

    /**
     * Reset component state.
     * @return void
     */
    public function resetInputFields(): void
    {
        $this->selected_contact = null;
    }

    /**
     * Load a specific message into the modal.
     * @param int $id
     * @return void
     */
    public function viewMessage(int $id): void
    {
        try {
            $this->selected_contact = Contact::findOrFail($id);
            $this->openModal();
        } catch (\Exception $e) {
            $this->dispatch('notify', ['type' => 'error', 'message' => 'Message not found.']);
        }
    }

    /**
     * Delete a contact inquiry from the system.
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        try {
            $contact = Contact::findOrFail($id);

            // Check if the deleted message is currently being viewed
            if ($this->selected_contact?->id == $id) {
                $this->closeModal();
                $this->resetInputFields();
            }

            $contact->delete();
            $this->dispatch('notify', 'Message deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Contact Delete Error: ' . $e->getMessage());
            $this->dispatch('notify', ['type' => 'error', 'message' => 'Delete operation failed.']);
        }
    }

    public function render()
    {
        return view('livewire.admin.contacts');
    }
}
