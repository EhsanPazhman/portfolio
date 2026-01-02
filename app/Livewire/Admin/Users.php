<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Traits\HasModal;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Livewire\Admin\AdminComponent;

class Users extends AdminComponent
{
    use HasModal;

    public $user_id;
    public $name;
    public $email;
    public $password;
    public $role = 'user';

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required|min:3',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user_id)],
            'password' => $this->user_id ? 'nullable|min:8' : 'required|min:8',
        ]);
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = 'user';
        $this->user_id = null;
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user_id)],
            'password' => $this->user_id ? 'nullable|min:8' : 'required|min:8',
            'role' => 'required'
        ]);

        try {
            $data = [
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
            ];

            if ($this->password) {
                $data['password'] = Hash::make($this->password);
            }

            User::updateOrCreate(['id' => $this->user_id], $data);

            $this->dispatch('notify', $this->user_id ? 'User updated' : 'User created');
            $this->closeModal();
            $this->resetInputFields();
        } catch (\Exception $e) {
            Log::error('User Store Error: ' . $e->getMessage());
            $this->dispatch('notify', 'Error: Transaction failed.');
        }
    }

    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            $this->user_id = $id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->role = $user->role;
            $this->isModalOpen = true;
        } catch (\Exception $e) {
            $this->dispatch('notify', 'User not found.');
        }
    }

    public function delete($id)
    {
        if ($id === Auth::id()) {
            $this->dispatch('notify', 'Security Alert: Cannot delete your own account!');
            return;
        }

        try {
            User::findOrFail($id)->delete();
            $this->dispatch('notify', 'User successfully removed');
        } catch (\Exception $e) {
            Log::error('User Delete Error: ' . $e->getMessage());
            $this->dispatch('notify', 'Error: Could not remove user.');
        }
    }

    public function render()
    {
        return view('livewire.admin.users', [
            'users' => User::latest()->get()
        ]);
    }
}
