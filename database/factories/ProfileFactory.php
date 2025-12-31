<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_title' => 'Laravel Developer',
            'bio' => 'I build clean, scalable web applications using Laravel and modern technologies.',
            'experience_summary' => 'Experience developing CRUD systems, admin dashboards, authentication systems, and scalable backend logic.',
            'avatar' => 'avatars/default.jpg',
            'status' => 'active',
        ];
    }
}
