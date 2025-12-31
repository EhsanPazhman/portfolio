<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('-5 years', 'now');
        $end = $this->faker->boolean(70) ? $this->faker->dateTimeBetween($start, 'now') : null;
        return [
            'title' => $this->faker->jobTitle(),
            'company' => $this->faker->company(),
            'start_date' => $start->format('Y-m-d'),
            'end_date' => $end ? $end->format('Y-m-d') : null,
            'description' => $this->faker->paragraph(),
        ];
    }
}
