<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Skill;
use App\Models\Technology;
use Livewire\Attributes\Validate;

/**
 * SkillForm Class
 * Unified form object managing Skills (with text levels) and Tech Stack.
 * Documentation: 2026 Clean Code Standard.
 */
class SkillForm extends Form
{
    /** @var int|null Record ID for updates */
    public ?int $itemId = null;

    /** @var string Type context: 'skill' or 'tech' */
    public string $type = 'skill';

    #[Validate]
    public $name = '';

    /** @var string Proficiency levels: beginner, intermediate, advanced */
    public $level = '';

    /**
     * Validation rules mapped to the properties.
     */
    public function rules(): array
    {
        return [
            'name'  => 'required|min:2|max:255',
            'level' => $this->type === 'skill' ? 'required|in:beginner,intermediate,advanced' : 'nullable',
        ];
    }

    /**
     * Populate form data from model.
     */
    public function setEntity($model, string $type): void
    {
        $this->itemId = $model->id;
        $this->type   = $type;
        $this->name   = $model->name;
        $this->level  = ($type === 'skill') ? $model->level : '';
    }

    /**
     * Persistent storage logic.
     */
    public function store(int $profileId): void
    {
        $data = ['profile_id' => $profileId, 'name' => $this->name];

        if ($this->type === 'skill') {
            $data['level'] = $this->level;
            Skill::updateOrCreate(['id' => $this->itemId], $data);
        } else {
            Technology::updateOrCreate(['id' => $this->itemId], $data);
        }
    }
}
