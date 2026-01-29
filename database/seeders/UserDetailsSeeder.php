<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserDetailsSeeder extends Seeder
{
    public function run(): void
    {
        User::all()->each(function ($user) {
            // Check if the user already has details to avoid duplicates
            if (!$user->detail) {
                $user->detail()->create([
                    'phone' => '123-456-7890',
                    'bio' => 'This is a default bio for ' . $user->name,
                    'address' => '123 Main Street',
                    'avatar' => null,
                ]);
            }
        });

        $this->command->info('UserDetails created for all users!');
    }
}
