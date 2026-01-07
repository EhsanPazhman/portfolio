<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

/**
 * UserForm Class
 * Standard Form Object for handling User and Profile logic in Livewire v3.
 * Optimized for 2026 clean code standards.
 */
class UserForm extends Form
{
    /** @var int|null */
    public ?int $userId = null;

    /** @var string Basic User Fields */
    public $name = '';
    public $email = '';
    public $password = '';
    public $role = 'user';

    /** @var string|null Profile Fields */
    public $job_title = '';
    public $bio = '';
    public $experience_summary = '';
    public $status = 'active';
    public $avatar;
    public $old_avatar;

    /**
     * Define validation rules.
     * Note: The keys must match the public properties defined above.
     * 
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'     => 'required|min:3',
            'email'    => "required|email|unique:users,email,{$this->userId}",
            'password' => $this->userId ? 'nullable|min:8' : 'required|min:8',
            'role'     => 'required|in:user,admin',
            // Admin-only conditional validation
            'job_title' => $this->role === 'admin' ? 'required|min:2' : 'nullable',
            'bio'       => $this->role === 'admin' ? 'required|max:255' : 'nullable',
            'avatar'    => ($this->role === 'admin' && !$this->userId) ? 'required|image|max:1024' : 'nullable|image|max:1024',
        ];
    }

    /**
     * Set form properties from an existing User model for editing.
     * 
     * @param User $user
     * @return void
     */
    public function setEntity(User $user): void
    {
        $this->userId = $user->id;
        $this->name   = $user->name;
        $this->email  = $user->email;
        $this->role   = $user->role;

        if ($user->profile) {
            $this->job_title          = $user->profile->job_title;
            $this->bio                = $user->profile->bio;
            $this->experience_summary = $user->profile->experience_summary;
            $this->old_avatar         = $user->profile->avatar;
            $this->status             = $user->profile->status;
        }
    }

    /**
     * Store or Update user and profile in a single transaction.
     * 
     * @return void
     */
    public function store(): void
    {
        DB::transaction(function () {
            $userData = [
                'name'  => $this->name,
                'email' => $this->email,
                'role'  => $this->role,
            ];

            if ($this->password) {
                $userData['password'] = Hash::make($this->password);
            }

            $user = User::updateOrCreate(['id' => $this->userId], $userData);

            if ($this->role === 'admin') {
                $profileData = [
                    'job_title'          => $this->job_title,
                    'bio'                => $this->bio,
                    'experience_summary' => $this->experience_summary,
                    'status'             => $this->status,
                ];

                if ($this->avatar) {
                    $profileData['avatar'] = $this->avatar->store('avatars', 'public');
                }

                $user->profile()->updateOrCreate(['user_id' => $user->id], $profileData);
            }
        });
    }
}
