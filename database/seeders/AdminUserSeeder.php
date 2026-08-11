<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@mohaborusafaris.com'],
            [
                'name' => 'Moha Boru Admin',
                'password' => 'password',
            ]
        );
    }
}
