<?php

namespace App\Livewire\Admin;

use App\Models\Experience;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Log;

class Experiences extends AdminComponent
{
    use \App\Traits\HasModal;

    public $experience_id;
    public $profile_id = 1;

    #[Rule('required|min:3|max:255')]
    public $title;

    #[Rule('required|min:2|max:255')]
    public $company;

    #[Rule('required|date')]
    public $start_date;

    #[Rule('nullable|date|after_or_equal:start_date')]
    public $end_date;

    #[Rule('nullable|string')]
    public $description;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->company = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->description = '';
        $this->experience_id = null;
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        try {
            $experience = $this->experience_id ? Experience::findOrFail($this->experience_id) : new Experience;

            $experience->profile_id = $this->profile_id;
            $experience->title = $this->title;
            $experience->company = $this->company;
            $experience->start_date = $this->start_date;
            $experience->end_date = $this->end_date;
            $experience->description = $this->description;

            $experience->save();

            $this->dispatch('notify', $this->experience_id ? 'Experience Updated' : 'Experience Created');
            $this->closeModal();
            $this->resetInputFields();
        } catch (\Exception $e) {
            Log::error('Experience Store Error: ' . $e->getMessage());
            $this->dispatch('notify', 'Error: Operation failed.');
        }
    }

    public function edit($id)
    {
        $exp = Experience::findOrFail($id);
        $this->experience_id = $id;
        $this->title = $exp->title;
        $this->company = $exp->company;
        $this->start_date = $exp->start_date;
        $this->end_date = $exp->end_date;
        $this->description = $exp->description;
        $this->isModalOpen = true;
    }

    public function delete($id)
    {
        try {
            Experience::findOrFail($id)->delete();
            $this->dispatch('notify', 'Experience Removed');
        } catch (\Exception $e) {
            Log::error('Experience Delete Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.experiences', [
            'experiences' => Experience::orderBy('start_date', 'desc')->get()
        ]);
    }
}
