<?php

namespace App\Livewire\Admin;

use Storage;
use App\Models\Project;
use Livewire\Component;
use App\Traits\HasModal;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class Projects extends Component
{
    use HasModal, WithFileUploads;

    public $project_id;
    public $profile_id = 1;

    #[Rule('required|min:3|max:255')]
    public $title;

    #[Rule('nullable|string')]
    public $description;

    #[Rule('nullable|image|max:2048')] // 2MB Max
    public $image;

    public $old_image; // To store existing image path

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

        $data = [
            'profile_id'     => $this->profile_id,
            'title'       => $this->title,
            'description' => $this->description,
            'github_url'  => $this->github_url,
            'demo_url'    => $this->demo_url,
        ];

        if ($this->image) {
            if ($this->project_id) {
                $project = Project::find($this->project_id);
                if ($project && $project->image) {
                    Storage::disk('public')->delete($project->image);
                }
            }

            $data['image'] = $this->image->store('projects', 'public');
        }

        Project::updateOrCreate(['id' => $this->project_id], $data);

        $this->dispatch('notify', $this->project_id ? 'Project Updated' : 'Project Created');
        $this->closeModal();
        $this->resetInputFields();
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
        $project = Project::findOrFail($id);
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();
        $this->dispatch('notify', 'Project and its image removed');
    }


    public function render()
    {
        return view('livewire.admin.projects', [
            'projects' => Project::latest()->get()
        ])->layout('layouts.admin');
    }
}
