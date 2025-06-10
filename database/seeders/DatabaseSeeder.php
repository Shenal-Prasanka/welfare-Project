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
            'email' => 'user@example.com',
            'password' => Hash::make('123456789'),
            'role' => '0',
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456789'),
            'role' => '1',
        ]);
        User::factory()->create([
            'name' => 'unitclerk',
            'email' => 'unitclerk@example.com',
            'password' => Hash::make('123456789'),
            'role' => '2',
        ]);
        User::factory()->create([
            'name' => 'unitoc',
            'email' => 'unitoc@example.com',
            'password' => Hash::make('123456789'),
            'role' => '3',
        ]);
        User::factory()->create([
            'name' => 'shopcoordclerk',
            'email' => 'shopcoordclerk@example.com',
            'password' => Hash::make('123456789'),
            'role' => '4',
        ]);
        User::factory()->create([
            'name' => 'shopcoordoc',
            'email' => 'shopcoordoc@example.com',
            'password' => Hash::make('123456789'),
            'role' => '5',
        ]);
        User::factory()->create([
            'name' => 'welfareshopclerk',
            'email' => 'welfareshopclerk@example.com',
            'password' => Hash::make('123456789'),
            'role' => '6',
        ]);
        User::factory()->create([
            'name' => 'welfareshopoc',
            'email' => 'welfareshopoc@example.com',
            'password' => Hash::make('123456789'),
            'role' => '7',
        ]);
        User::factory()->create([
            'name' => 'ledgerclerk',
            'email' => 'ledgerclerk@example.com',
            'password' => Hash::make('123456789'),
            'role' => '8',
        ]);
        User::factory()->create([
            'name' => 'ledgeroc',
            'email' => 'ledgeroc@example.com',
            'password' => Hash::make('123456789'),
            'role' => '9',
        ]);
    }
}
