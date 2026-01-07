<?php

namespace App\Livewire\Admin;

use App\Models\Experience;
use App\Livewire\Forms\ExperienceForm;
use App\Traits\HasModal;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Log;

/**
 * Experiences Management Component
 * Optimized for Livewire v3 with Form Objects.
 */
class Experiences extends AdminComponent
{
    use HasModal;

    /** @var ExperienceForm Form instance */
    public ExperienceForm $form;

    /**
     * Computed property to retrieve experiences with optimized sorting.
     */
    #[Computed]
    public function experiences()
    {
        return Experience::where('profile_id', $this->profile_id)
            ->orderBy('start_date', 'desc')
            ->get();
    }

    /**
     * Handle store and update operations.
     */
    public function save()
    {
        // Validating via form object
        $this->form->validate();

        try {
            $this->form->store($this->profile_id);

            $this->dispatch('notify', $this->form->experienceId ? 'Experience Updated' : 'Experience Created');
            $this->closeModal();
            $this->form->reset();
        } catch (\Exception $e) {
            Log::error('Experience Store Error: ' . $e->getMessage());
            $this->dispatch('notify', ['type' => 'error', 'message' => 'Operation failed.']);
        }
    }

    /**
     * Load experience for edit modal.
     * @param int $id
     */
    public function edit(int $id)
    {
        try {
            $experience = Experience::where('profile_id', $this->profile_id)->findOrFail($id);
            $this->form->setExperience($experience);
            $this->openModal();
        } catch (\Exception $e) {
            $this->dispatch('notify', ['type' => 'error', 'message' => 'Experience not found.']);
        }
    }

    /**
     * Delete an experience record.
     * @param int $id
     */
    public function delete(int $id)
    {
        try {
            Experience::where('profile_id', $this->profile_id)->findOrFail($id)->delete();
            $this->dispatch('notify', 'Experience Removed');
        } catch (\Exception $e) {
            Log::error('Experience Delete Error: ' . $e->getMessage());
            $this->dispatch('notify', ['type' => 'error', 'message' => 'Delete failed.']);
        }
    }

    public function render()
    {
        return view('livewire.admin.experiences');
    }
}
