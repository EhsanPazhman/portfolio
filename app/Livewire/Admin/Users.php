<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Profile;
use App\Traits\HasModal;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class Users extends AdminComponent
{
    use HasModal, WithFileUploads;

    public $user_id;
    public $name;
    public $email;
    public $password;
    public $role = 'user';

    public $job_title;
    public $bio;
    public $experience_summary;
    public $avatar;
    public $old_avatar;
    public $status = 'active';

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = 'user';
        $this->user_id = null;

        $this->job_title = '';
        $this->bio = '';
        $this->experience_summary = '';
        $this->avatar = null;
        $this->old_avatar = null;
        $this->status = 'active';
        $this->resetValidation();
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user_id)],
            'password' => $this->user_id ? 'nullable|min:8' : 'required|min:8',
            'role' => 'required'
        ];

        if ($this->role === 'admin') {
            $rules['job_title'] = 'required|min:2';
            $rules['bio'] = 'required|max:255';
            $rules['avatar'] = $this->user_id ? 'nullable|image|max:1024' : 'required|image|max:1024';
        }

        $this->validate($rules);

        try {
            $userData = [
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
            ];

            if ($this->password) {
                $userData['password'] = Hash::make($this->password);
            }

            $user = User::updateOrCreate(['id' => $this->user_id], $userData);
            if ($this->role === 'admin') {
                $profileData = [
                    'job_title' => $this->job_title,
                    'bio' => $this->bio,
                    'experience_summary' => $this->experience_summary,
                    'status' => $this->status,
                ];

                if ($this->avatar) {
                    $profileData['avatar'] = $this->avatar->store('avatars', 'public');
                }

                $user->profile()->updateOrCreate(['user_id' => $user->id], $profileData);
            }

            $this->dispatch('notify', $this->user_id ? 'User & Profile Updated' : 'User & Profile Created');
            $this->closeModal();
            $this->resetInputFields();
        } catch (\Exception $e) {
            Log::error('User/Profile Store Error: ' . $e->getMessage());
            $this->dispatch('notify', 'Error: Operation failed.');
        }
    }
    #[On('edit')]
    public function edit($id)
    {
        try {
            $user = User::with('profile')->findOrFail($id);
            $this->user_id = $id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->role = $user->role;

            if ($user->profile) {
                $this->job_title = $user->profile->job_title;
                $this->bio = $user->profile->bio;
                $this->experience_summary = $user->profile->experience_summary;
                $this->old_avatar = $user->profile->avatar;
                $this->status = $user->profile->status;
            }

            $this->isModalOpen = true;
        } catch (\Exception $e) {
            $this->dispatch('notify', 'User not found.');
        }
    }

    public function render()
    {
        return view('livewire.admin.users', [
            'users' => User::latest()->get()
        ]);
    }
}
