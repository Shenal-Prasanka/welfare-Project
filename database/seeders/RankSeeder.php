<?php

namespace Database\Seeders;
use App\Models\Rank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  
         Rank::factory()->create([
            'rank' => 'User2',
            'type' => 'type1',
            'active' => '1',
        ]);
    }
}
