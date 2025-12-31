<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        if (! $admin || ! $admin->profile) return;

        Technology::factory()
            ->count(7)
            ->create([
                'profile_id' => $admin->profile->id,
            ]);
    }
}
