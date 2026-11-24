<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //User::factory()->count(3)->create();

        $system_user = [
            [
                'id' => 1,
                'user_type' => 1,
                'name' => 'System Admin',
                'email' => 'admin@mkhandev.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'id' => 2,
                'user_type' => 2,
                'name' => 'Abdullah Al Mahmud Khan',
                'email' => 'mahmudkhan.sumon@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'id' => 3,
                'user_type' => 2,
                'name' => 'Mahmud Khan',
                'email' => 'mahmud@mkhandev.com',
                'password' => Hash::make('12345678'),
            ]
        ];

        User::insert($system_user);
    }
}
