<?php

namespace App\Livewire\Admin;

use App\Models\Project;
use App\Traits\HasModal;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use App\Livewire\Admin\AdminComponent;
use Illuminate\Support\Facades\Storage;

class Projects extends AdminComponent
{
    use HasModal, WithFileUploads;

    public $project_id;
    public $profile_id = 1; 

    #[Rule('required|min:3|max:255')]
    public $title;

    #[Rule('nullable|string')]
    public $description;

    #[Rule('nullable|image|max:2048')]
    public $image;

    public $old_image;

    #[Rule('nullable|url')]
    public $github_url;

    #[Rule('nullable|url')]
    public $demo_url;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->image = null;
        $this->old_image = null;
        $this->github_url = '';
        $this->demo_url = '';
        $this->project_id = null;
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        try {
            $project = $this->project_id ? Project::findOrFail($this->project_id) : new Project;

            $project->profile_id  = $this->profile_id ;
            $project->title = $this->title;
            $project->description = $this->description;
            $project->github_url = $this->github_url;
            $project->demo_url = $this->demo_url;

            if ($this->image) {
                if ($project->image && Storage::disk('public')->exists($project->image)) {
                    Storage::disk('public')->delete($project->image);
                }
                $project->image = $this->image->store('projects', 'public');
            }

            $project->save();

            $this->dispatch('notify', $this->project_id ? 'Project Updated' : 'Project Created');
            $this->closeModal();
            $this->resetInputFields();
        } catch (\Exception $e) {
            Log::error('Project Store Error: ' . $e->getMessage());
            $this->dispatch('notify', 'Error: Transaction failed.');
        }
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $this->project_id = $id;
        $this->title = $project->title;
        $this->description = $project->description;
        $this->github_url = $project->github_url;
        $this->demo_url = $project->demo_url;
        $this->old_image = $project->image;
        $this->isModalOpen = true;
    }

    public function delete($id)
    {
        try {
            $project = Project::findOrFail($id);
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }
            $project->delete();
            $this->dispatch('notify', 'Project Removed');
        } catch (\Exception $e) {
            Log::error('Project Delete Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.projects', [
            'projects' => Project::latest()->get()
        ]);
    }
}
