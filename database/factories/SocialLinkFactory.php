<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SocialLink>
 */
class SocialLinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $platformIcons = [
            'Email'     => 'fa-solid fa-envelope',
            'X'         => 'fa-brands fa-x-twitter',
            'GitHub'    => 'fa-brands fa-github',
            'LinkedIn'  => 'fa-brands fa-linkedin',
            'Telegram'  => 'fa-brands fa-telegram',
            'Instagram' => 'fa-brands fa-instagram',
        ];

        $platform = $this->faker->randomElement(array_keys($platformIcons));

        return [
            'platform'   => $platform,
            'url'        => $this->faker->url(),
            'icon'       => $platformIcons[$platform],
        ];
    }
}
