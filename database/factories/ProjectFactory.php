<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'image' =>  $this->faker->randomElement([
                'projects/1.jpeg',
                'projects/2.jpeg',
                'projects/3.jpeg',
                'projects/4.jpeg',
            ]),
            'github_url' => $this->faker->url(),
            'demo_url' => $this->faker->url(),
        ];
    }
}
