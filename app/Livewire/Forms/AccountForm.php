<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\{Hash, Storage};

/**
 * AccountForm Class (2026 Optimized)
 * Manages Admin profile updates, password hashing, and asset cleanup.
 */
class AccountForm extends Form
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $job_title = '';
    public $bio = '';
    public $experience_summary = '';
    public $avatar;
    public $old_avatar;

    /**
     * Dynamic validation rules for account settings.
     */
    public function rules(): array
    {
        $userId = auth()->id();
        return [
            'name'      => 'required|min:3',
            'email'     => "required|email|unique:users,email,{$userId}",
            'password'  => 'nullable|min:8',
            'job_title' => 'required|min:2',
            'avatar'    => 'nullable|image|max:1024',
        ];
    }

    /**
     * Fill form properties from the authenticated user.
     */
    public function setAccount(User $user): void
    {
        $this->name = $user->name;
        $this->email = $user->email;
        $this->job_title = $user->profile?->job_title ?? '';
        $this->bio = $user->profile?->bio ?? '';
        $this->experience_summary = $user->profile?->experience_summary ?? '';
        $this->old_avatar = $user->profile?->avatar;
    }

    /**
     * Perform the update operation for User and Profile.
     */
    public function update(User $user): void
    {
        // 1. Update User Identity
        $userData = [
            'name'  => $this->name,
            'email' => $this->email,
        ];

        if ($this->password) {
            $userData['password'] = Hash::make($this->password);
        }

        $user->update($userData);

        // 2. Handle Profile Data & Avatar
        $profileData = [
            'job_title'          => $this->job_title,
            'bio'                => $this->bio,
            'experience_summary' => $this->experience_summary,
        ];

        if ($this->avatar) {
            // Cleanup old avatar from disk
            if ($this->old_avatar) {
                Storage::disk('public')->delete($this->old_avatar);
            }
            $profileData['avatar'] = $this->avatar->store('avatars', 'public');
        }

        $user->profile()->updateOrCreate(['user_id' => $user->id], $profileData);
    }
}
