<?php

namespace App\Livewire\Web;

use App\Models\User;
use Livewire\Attributes\Rule;
use App\Livewire\Web\BaseComponent;
use Illuminate\Support\Facades\Log;

use App\Models\Contact as ContactModel;

class Contact extends BaseComponent
{
    public $owner;

    #[Rule('required|min:3')]
    public $name;

    #[Rule('required|email')]
    public $email;

    #[Rule('nullable|min:5')]
    public $subject;

    #[Rule('required|min:10')]
    public $message;

    public function sendMessage()
    {
        $this->validate();

        try {
            ContactModel::create([
                'name' => $this->name,
                'email' => $this->email,
                'subject' => $this->subject,
                'message' => $this->message,
            ]);

            $this->reset(['name', 'email', 'subject', 'message']);

            $this->dispatch('notify', 'Message sent successfully!');
        } catch (\Exception $e) {
            Log::error('Front Contact Error: ' . $e->getMessage());
            $this->dispatch('notify', 'Error: Message not sent.');
        }
    }

    public function render()
    {
        $this->owner = User::where('role', 'admin')
            ->with(['profile.socialLinks'])
            ->firstOrFail();

        return view('livewire.web.contact');
    }
}
