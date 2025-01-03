<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'user_id' => 1,
            'full_name' => 'Wildan Cinta Persib',
            'address' => 'Jl. Raya Kedungwuni',
            'phone' => '08123456789',
            'bio' => 'Saya adalah seorang programmer',
            'profile_picture' => 'profile.jpg',
        ]);
    }
}
