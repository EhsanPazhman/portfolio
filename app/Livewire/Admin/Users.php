<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Livewire\Forms\UserForm;
use App\Traits\HasModal;
use Livewire\WithFileUploads;
use Livewire\Attributes\{On, Computed};
use Illuminate\Support\Facades\Log;

/**
 * Users Management Component
 * Optimized for Livewire v3 (2026) using Form Objects.
 */
class Users extends AdminComponent
{
    use HasModal, WithFileUploads;

    /** @var UserForm Holding user and profile state */
    public UserForm $form;

    /**
     * Computed property to fetch users with profiles.
     * Caches the result for the current request.
     */
    #[Computed]
    public function users()
    {
        return User::with('profile')->latest()->get();
    }

    /**
     * Store or Update user data.
     */
    public function store()
    {
        // Validation is handled within the rules() method of UserForm
        $this->form->validate();

        try {
            $this->form->store();

            $this->dispatch('notify', $this->form->userId ? 'User Updated' : 'User Created');
            $this->closeModal();
            $this->form->reset();
        } catch (\Exception $e) {
            Log::error('User Store Error: ' . $e->getMessage());
            $this->dispatch('notify', 'Operation failed.');
        }
    }

    /**
     * Load user data for editing.
     */
    #[On('edit')]
    public function edit($id)
    {
        try {
            $user = User::with('profile')->findOrFail($id);
            $this->form->setEntity($user);
            $this->isModalOpen = true;
        } catch (\Exception $e) {
            $this->dispatch('notify', 'User not found.');
        }
    }

    /**
     * Delete user from system.
     */
    public function delete($id)
    {
        try {
            User::destroy($id);
            $this->dispatch('notify', 'User removed successfully.');
        } catch (\Exception $e) {
            $this->dispatch('notify', 'Error deleting user.');
        }
    }

    public function render()
    {
        return view('livewire.admin.users');
    }
}
