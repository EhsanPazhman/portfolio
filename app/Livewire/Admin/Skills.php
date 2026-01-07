<?php

namespace App\Livewire\Admin;

use App\Models\Skill;
use App\Models\Technology;
use App\Livewire\Forms\SkillForm;
use App\Traits\HasModal;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Log;

/**
 * Skills & Technologies Administration Component
 * Standard 2026 clean implementation.
 */
class Skills extends AdminComponent
{
    use HasModal;

    /** @var SkillForm Unified form instance */
    public SkillForm $form;

    /**
     * Get Skills for the profile.
     */
    #[Computed]
    public function skills()
    {
        return Skill::where('profile_id', $this->profile_id)->get();
    }

    /**
     * Get Technologies for the profile.
     */
    #[Computed]
    public function technologies()
    {
        return Technology::where('profile_id', $this->profile_id)->get();
    }

    /**
     * Open modal with specific context (Skill or Tech).
     */
    public function openModalWithType(string $type, ?int $id = null)
    {
        $this->form->reset();
        $this->form->type = $type;

        if ($id) {
            $model = ($type === 'skill')
                ? Skill::where('profile_id', $this->profile_id)->findOrFail($id)
                : Technology::where('profile_id', $this->profile_id)->findOrFail($id);

            $this->form->setEntity($model, $type);
        }

        $this->openModal();
    }

    /**
     * Save data after validation.
     */
    public function save()
    {
        $this->form->validate();

        try {
            $this->form->store($this->profile_id);

            $this->dispatch('notify', ucfirst($this->form->type) . ' Saved Successfully');
            $this->closeModal();
            $this->form->reset();
        } catch (\Exception $e) {
            Log::error('Skill/Tech Store Error: ' . $e->getMessage());
            $this->dispatch('notify', ['type' => 'error', 'message' => 'Operation failed.']);
        }
    }

    /**
     * Delete the specified record.
     */
    public function delete(string $type, int $id)
    {
        try {
            $query = ($type === 'skill') ? Skill::query() : Technology::query();
            $query->where('profile_id', $this->profile_id)->findOrFail($id)->delete();

            $this->dispatch('notify', 'Deleted successfully');
        } catch (\Exception $e) {
            Log::error('Delete Error: ' . $e->getMessage());
            $this->dispatch('notify', ['type' => 'error', 'message' => 'Error during deletion.']);
        }
    }

    public function render()
    {
        return view('livewire.admin.skills');
    }
}
