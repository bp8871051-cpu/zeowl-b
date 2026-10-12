<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@zeowl.com'],
            [
                'name' => 'Zeowl Administrator',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'role' => 'Super Admin',
                'is_active' => true,
            ]
        );
    }
}
