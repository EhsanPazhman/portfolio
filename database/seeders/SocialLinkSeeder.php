<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SocialLink;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        if (! $admin || ! $admin->profile) return;

        SocialLink::factory()
            ->count(4)
            ->create([
                'profile_id' => $admin->profile->id,
            ]);
    }
}
