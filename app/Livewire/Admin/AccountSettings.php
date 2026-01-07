<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\AccountForm;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

/**
 * Account Settings Component
 * Standard 2026 Admin Profile Management.
 */
class AccountSettings extends Component
{
    use WithFileUploads;

    /** @var bool Modal visibility state */
    public bool $isModalOpen = false;

    /** @var AccountForm The form object instance */
    public AccountForm $form;

    /**
     * Listener to trigger settings modal from other components.
     */
    #[On('open-settings')]
    public function openModal()
    {
        $this->resetErrorBag();

        // Eager load profile to avoid N+1
        $user = auth()->user()->load('profile');
        $this->form->setAccount($user);

        $this->isModalOpen = true;
    }

    /**
     * Close modal and reset form state.
     */
    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->form->reset();
    }

    /**
     * Save profile changes after validation.
     */
    public function save()
    {
        $this->form->validate();

        try {
            $this->form->update(auth()->user());

            $this->isModalOpen = false;
            $this->dispatch('notify', 'Profile settings updated successfully!');

            // Optional: refresh current page if name/avatar changed in sidebar
            $this->dispatch('refresh-sidebar');
        } catch (\Exception $e) {
            Log::error('Account Settings Update Error: ' . $e->getMessage());
            $this->dispatch('notify', ['type' => 'error', 'message' => 'Failed to update account.']);
        }
    }

    public function render()
    {
        return view('livewire.admin.account-settings');
    }
}
