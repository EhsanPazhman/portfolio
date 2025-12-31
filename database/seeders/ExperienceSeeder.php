<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Experience;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        if (! $admin || ! $admin->profile) {
            return;
        }

        Experience::factory()
            ->count(5)
            ->create([
                'profile_id' => $admin->profile->id,
            ]);
    }
}
