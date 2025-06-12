<?php

namespace Database\Seeders;
use App\Models\Regement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Regement::factory()->create([
            'regement' => 'User3',
            'active' => '1',
        ]);
    }
}
