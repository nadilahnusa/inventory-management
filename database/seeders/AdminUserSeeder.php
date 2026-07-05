<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@telkom.co.id'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
            ],
        );

        $admin->syncRoles(['Administrator']);
    }
}