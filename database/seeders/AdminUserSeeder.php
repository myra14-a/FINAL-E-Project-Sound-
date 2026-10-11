<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@example.com');
        $password = env('ADMIN_PASSWORD', 'ChangeMe123!');

        $admin = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => env('ADMIN_NAME', 'Administrator'),
                'username' => env('ADMIN_USERNAME', 'admin'),
                'address' => env('ADMIN_ADDRESS', 'Website Administration'),
                'phone' => env('ADMIN_PHONE', '0000000000'),
                'email_verified_at' => now(),
                'password' => Hash::make($password),
                'is_admin' => true,
            ]
        );

        foreach ([
            ['YEAR', '2026'],
            ['YEAR', '2025'],
            ['ARTIST', 'Atif Aslam'],
            ['ARTIST', 'Arijit Singh'],
            ['ALBUM', 'Singles'],
            ['GENRE', 'OST'],
            ['GENRE', 'Pop'],
        ] as [$type, $name]) {
            Category::firstOrCreate(compact('type', 'name'));
        }

        $this->command?->info("Admin login ready: {$admin->email}");
    }
}
