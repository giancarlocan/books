<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Giancarlo',
                'is_parent' => true,
                'email' => 'canessa@hey.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Melissa',
                'is_parent' => true,
                'email' => 'melissacanessa@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Gianni',
                'is_parent' => false,
                'email' => 'gianni.c.canessa@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$12$JuOGw4RK3Vdjzacynx4MXeHo/JkXmpRm0vJ4pz3LMAWnD5piUBmXi',
            ],
            [
                'name' => 'Enzo',
                'is_parent' => false,
                'email' => 'enzo.g.canessa@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$12$gZ6d7g9Gr.RqOE5usk76eeM/3ab5UzTrLcwwLNo5fgQbfC1IvyUSa',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
