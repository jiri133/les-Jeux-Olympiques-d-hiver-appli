<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Olympic Organizer',
            'email' => 'organizer@jo.fr',
            'password' => Hash::make('password'),
            'is_organizer' => true,
        ]);
    }
}