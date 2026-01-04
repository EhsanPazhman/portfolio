<?php

namespace App\Livewire\Admin;

use App\Models\Contact;
use Illuminate\Support\Facades\Log;

class Contacts extends AdminComponent
{
    use \App\Traits\HasModal;

    public $selected_contact;

    public function viewMessage($id)
    {
        try {
            $this->selected_contact = Contact::findOrFail($id);
            $this->isModalOpen = true;
        } catch (\Exception $e) {
            $this->dispatch('notify', 'Message not found.');
        }
    }

    public function resetInputFields()
    {
        $this->selected_contact = null;
    }

    public function delete($id)
    {
        try {
            Contact::findOrFail($id)->delete();
            $this->dispatch('notify', 'Message deleted');
            if ($this->selected_contact?->id == $id) {
                $this->closeModal();
            }
        } catch (\Exception $e) {
            Log::error('Contact Delete Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.contacts', [
            'messages' => Contact::latest()->get()
        ]);
    }
}
