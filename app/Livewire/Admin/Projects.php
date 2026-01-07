<?php

namespace App\Livewire\Admin;

use App\Models\Project;
use App\Traits\HasModal;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;
use App\Livewire\Forms\ProjectForm;
use Illuminate\Support\Facades\{Log, Storage};

/**
 * Projects Administration Component
 * Standard 2026 Implementation using Form Objects and Computed Properties.
 */
class Projects extends AdminComponent
{
    use HasModal, WithFileUploads;

    /** @var ProjectForm Data transfer object for project forms */
    public ProjectForm $form;

    /**
     * Fetch projects via Computed Property for improved performance.
     */
    #[Computed]
    public function projects()
    {
        return Project::where('profile_id', $this->profile_id)
            ->latest()
            ->get();
    }

    /**
     * Validate and save project information.
     */
    public function save()
    {
        // Validating the form object context
        $this->form->validate();

        try {
            $this->form->store($this->profile_id);

            $this->dispatch('notify', $this->form->projectId ? 'Project Updated Successfully' : 'Project Created Successfully');
            $this->closeModal();
            $this->form->reset();
        } catch (\Exception $e) {
            Log::error('Project Store Error: ' . $e->getMessage());
            $this->dispatch('notify', ['type' => 'error', 'message' => 'Operation failed.']);
        }
    }

    /**
     * Load project data for editing.
     * @param int $id
     */
    public function edit($id)
    {
        try {
            $project = Project::findOrFail($id);
            $this->form->setProject($project);
            $this->openModal();
        } catch (\Exception $e) {
            $this->dispatch('notify', ['type' => 'error', 'message' => 'Record not found.']);
        }
    }

    /**
     * Delete record and clean up associated disk assets.
     * @param int $id
     */
    public function delete($id)
    {
        try {
            $project = Project::findOrFail($id);
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $project->delete();
            $this->dispatch('notify', 'Project Removed Successfully');
        } catch (\Exception $e) {
            Log::error('Project Delete Error: ' . $e->getMessage());
            $this->dispatch('notify', ['type' => 'error', 'message' => 'Delete operation failed.']);
        }
    }

    public function render()
    {
        return view('livewire.admin.projects');
    }
}
