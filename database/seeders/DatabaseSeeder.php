<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => '0',
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => '1',
        ]);
        User::factory()->create([
            'name' => 'Unitclerk',
            'email' => 'unitclerk@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => '2',
        ]);
        User::factory()->create([
            'name' => 'Unitoc',
            'email' => 'unitoc@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => '3',
        ]);
        User::factory()->create([
            'name' => 'Shopcoordclerk',
            'email' => 'shopcoordclerk@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => '4',
        ]);
        User::factory()->create([
            'name' => 'Shopcoordoc',
            'email' => 'shopcoordoc@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => '5',
        ]);
        User::factory()->create([
            'name' => 'Welfareshopclerk',
            'email' => 'welfareshopclerk@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => '6',
        ]);
        User::factory()->create([
            'name' => 'Welfareshopoc',
            'email' => 'welfareshopoc@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => '7',
        ]);
        User::factory()->create([
            'name' => 'Ledgerclerk',
            'email' => 'ledgerclerk@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => '8',
        ]);
        User::factory()->create([
            'name' => 'Ledgeroc',
            'email' => 'ledgeroc@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => '9',
        ]);
    }
}
