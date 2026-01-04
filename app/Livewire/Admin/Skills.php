<?php

namespace App\Livewire\Admin;

use App\Models\Skill;
use App\Models\Technology;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Log;

class Skills extends AdminComponent
{
    use \App\Traits\HasModal;
    public $item_id;
    public $type;

    #[Rule('required|min:2|max:255')]
    public $name;

    #[Rule('required_if:type,skill')]
    public $level;

    public function resetInputFields()
    {
        $this->name = '';
        $this->level = '';
        $this->item_id = null;
        $this->resetValidation();
    }

    public function openModalWithType($type, $id = null)
    {
        $this->type = $type;
        if ($id) {
            $this->edit($id);
        } else {
            $this->resetInputFields();
            $this->openModal();
        }
    }

    public function store()
    {
        $this->validate();

        try {
            if ($this->type === 'skill') {
                Skill::updateOrCreate(['id' => $this->item_id], [
                    'profile_id' => $this->profile_id,
                    'name' => $this->name,
                    'level' => $this->level,
                ]);
            } else {
                Technology::updateOrCreate(['id' => $this->item_id], [
                    'profile_id' => $this->profile_id,
                    'name' => $this->name,
                ]);
            }

            $this->dispatch('notify', ucfirst($this->type) . ' saved');
            $this->closeModal();
            $this->resetInputFields();
        } catch (\Exception $e) {
            Log::error('Skill/Tech Store Error: ' . $e->getMessage());
            $this->dispatch('notify', 'Error: Transaction failed.');
        }
    }

    public function edit($id)
    {
        $model = $this->type === 'skill'
            ? Skill::where('profile_id', $this->profile_id)->findOrFail($id)
            : Technology::where('profile_id', $this->profile_id)->findOrFail($id);

        $this->item_id = $id;
        $this->name = $model->name;
        $this->level = $this->type === 'skill' ? $model->level : null;
        $this->isModalOpen = true;
    }

    public function delete($type, $id)
    {
        try {
            if ($type === 'skill') {
                Skill::where('profile_id', $this->profile_id)->where('id', $id)->delete();
            } else {
                Technology::where('profile_id', $this->profile_id)->where('id', $id)->delete();
            }
            $this->dispatch('notify', 'Deleted successfully');
        } catch (\Exception $e) {
            Log::error('Delete Error: ' . $e->getMessage());
            $this->dispatch('notify', 'Error during deletion.');
        }
    }

    public function render()
    {
        return view('livewire.admin.skills', [
            'skills' => Skill::where('profile_id', $this->profile_id)->get(),
            'techs' => Technology::where('profile_id', $this->profile_id)->get(),
        ]);
    }
}
