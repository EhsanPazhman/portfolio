<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Hash;

class AccountSettings extends Component
{
    use WithFileUploads;

    public $isModalOpen = false;
    public $name, $email, $password, $job_title, $bio, $experience_summary, $avatar, $old_avatar;

    #[On('open-settings')]
    public function openModal()
    {
        $this->resetErrorBag();

        $user = auth()->user()->load('profile');
        $this->name = $user->name;
        $this->email = $user->email;
        $this->job_title = $user->profile?->job_title ?? '';
        $this->bio = $user->profile?->bio ?? '';
        $this->experience_summary = $user->profile?->experience_summary ?? '';
        $this->old_avatar = $user->profile?->avatar;

        $this->isModalOpen = true;
    }

    public function save()
    {
        $user = auth()->user();

        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'job_title' => 'required',
            'avatar' => 'nullable|image|max:1024',
        ]);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password ? Hash::make($this->password) : $user->password,
        ]);

        $user->profile()->updateOrCreate(['user_id' => $user->id], [
            'job_title' => $this->job_title,
            'bio' => $this->bio,
            'experience_summary' => $this->experience_summary,
            'avatar' => $this->avatar ? $this->avatar->store('avatars', 'public') : $this->old_avatar,
        ]);

        $this->isModalOpen = false;
        $this->dispatch('notify', 'Profile updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.account-settings');
    }
}
