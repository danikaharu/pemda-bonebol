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
        User::create([
            'username' => 'bonebola',
            'name' => 'Super Admin',
            'email' => 'admin@bonebolangokab.go.id',
            'password' => Hash::make('123456'),
        ]);
    }
}
