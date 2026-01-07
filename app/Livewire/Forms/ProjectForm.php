<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Project;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

/**
 * ProjectForm Class (2026 Optimized)
 * Manages validation and persistence logic for Projects.
 */
class ProjectForm extends Form
{
    /** @var int|null Current project ID */
    public ?int $projectId = null;

    #[Validate('required|min:3|max:255')]
    public $title = '';

    #[Validate('nullable|string')]
    public $description = '';

    /** 
     * Direct Validation attribute ensures stable temporary file handling 
     */
    #[Validate('nullable|image|max:2048')]
    public $image;

    public $old_image;

    #[Validate('nullable|url')]
    public $github_url = '';

    #[Validate('nullable|url')]
    public $demo_url = '';

    /**
     * Map model data to form properties for editing.
     * @param Project $project
     */
    public function setProject(Project $project): void
    {
        $this->projectId = $project->id;
        $this->title = $project->title;
        $this->description = $project->description;
        $this->github_url = $project->github_url;
        $this->demo_url = $project->demo_url;
        $this->old_image = $project->image;
    }

    /**
     * Persist project data to the database.
     * @param int $profileId
     */
    public function store(int $profileId): void
    {
        $project = Project::findOrNew($this->projectId);

        $project->profile_id = $profileId;
        $project->title = $this->title;
        $project->description = $this->description;
        $project->github_url = $this->github_url;
        $project->demo_url = $this->demo_url;

        // Secure file handling: ensure $this->image is a fully uploaded file object
        if ($this->image && is_object($this->image)) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $project->image = $this->image->store('projects', 'public');
        }
        $project->save();
    }
}
