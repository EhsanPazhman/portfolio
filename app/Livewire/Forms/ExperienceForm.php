<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Experience;
use Livewire\Attributes\Validate;

/**
 * ExperienceForm Class
 * Handles validation and persistence logic for Professional Experiences.
 * Standardized for 2026 clean code practices.
 */
class ExperienceForm extends Form
{
    /** @var int|null Current experience ID for updates */
    public ?int $experienceId = null;

    #[Validate('required|min:3|max:255')]
    public $title = '';

    #[Validate('required|min:2|max:255')]
    public $company = '';

    #[Validate('required|date')]
    public $start_date = '';

    #[Validate('nullable|date|after_or_equal:start_date')]
    public $end_date = '';

    #[Validate('nullable|string')]
    public $description = '';

    /**
     * Map model data to form properties.
     * @param Experience $experience
     */
    public function setExperience(Experience $experience): void
    {
        $this->experienceId = $experience->id;
        $this->title = $experience->title;
        $this->company = $experience->company;
        $this->start_date = $experience->start_date;
        $this->end_date = $experience->end_date;
        $this->description = $experience->description;
    }

    /**
     * Create or update the experience record.
     * @param int $profileId
     */
    public function store(int $profileId): void
    {
        $experience = Experience::findOrNew($this->experienceId);

        $experience->profile_id = $profileId;
        $experience->title = $this->title;
        $experience->company = $this->company;
        $experience->start_date = $this->start_date;
        $experience->end_date = $this->end_date;
        $experience->description = $this->description;

        $experience->save();
    }
}
