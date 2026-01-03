<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamMember::create([
            'name' => 'John Doe',
            'role' => 'Lead Developer',
            'bio' => 'Full-stack developer with 10 years of experience.',
            'github_link' => 'https://github.com',
        ]);
        TeamMember::create([
            'name' => 'Jane Smith',
            'role' => 'UI/UX Designer',
            'bio' => 'Passionate designer ensuring the best user experience.',
            'dribbble_link' => 'https://dribbble.com',
        ]);
        TeamMember::create([
            'name' => 'Bob Johnson',
            'role' => 'Backend Engineer',
            'bio' => 'Specializes in scalable server-side architectures.',
            'twitter_link' => 'https://twitter.com',
        ]);
    }
}
