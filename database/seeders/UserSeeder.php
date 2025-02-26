<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'a',
            'email' => 'a@a.a',
            'password' =>Hash::make('password'),
        ]);
        User::create([
            'name' => 'b',
            'email' => 'b@b.b',
            'password' =>Hash::make('password'),
        ]);
        User::create([
            'name' => 'Jacinto',
            'email' => 'jc@example.com',
            'password' =>Hash::make('password'),
        ]);
    }
}
