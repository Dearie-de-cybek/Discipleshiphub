<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Pastor Admin',
            'email' => 'admin@kingdomheralds.com',
            'password' => Hash::make('Password123!'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        $this->command->info('✓ Admin user created successfully!');
        $this->command->info('Email: admin@kingdomheralds.com');
        $this->command->info('Password: Password123!');
        $this->command->warn('⚠ Please change the password after first login!');
    }
}