<?php

namespace Database\Seeders;
use App\Models\Welfare;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WelfareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Welfare::factory()->create([
            'name' => 'User1',
            'active' => '1',
        ]);
    }
}
