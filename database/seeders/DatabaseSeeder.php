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

       // User::factory()->create([
           // 'name' => 'User',
           // 'email' => 'user@gmail.com',
           // 'mobile' => '0712518430',
           // 'adress' => 'PahalaYagoda,Ganemulla',
           // 'employee-no' => 'E0',
           // 'regement-no' => 'R0',
           // 'regement_id' => '2',
           // 'unit_id' => '2',
          //  'rank_id' => '2',
           // 'role' => '0',
           // 'delete' => '0',
           // 'password' => Hash::make('123456789'),
            
      //  ]);
       // User::factory()->create([
       //     'name' => 'Admin',
        //    'email' => 'admin@gmail.com',
       //     'mobile' => '0712518431',
        //    'address' => 'PahalaYagoda,Ganemulla',
        //    'employee_no' => 'E1',
        //    'regement_no' => 'R1',
        //    'regement_id' => '2',
        //    'unit_id' => '2',
        //    'rank_id' => '2',
        //    'role' => '1',
        //    'active' => '0',
        //    'delete' => '0',
        //    'password' => Hash::make('123456789'),
       // ]);
       User::factory()->create([
            'name' => 'Ajith',
            'email' => 'unitclerk@gmail.com',
            'mobile' => '0712518432',
            'address' => 'PahalaYagoda,Ganemulla',
            'employee_no' => 'E2',
            'regement_no' => 'R2',
            'regement_id' => '2',
            'unit_id' => '2',
            'rank_id' => '1',
            'role' => '2',
            'delete' => '1',
            'password' => Hash::make('123456789'),
        ]);
        User::factory()->create([
            'name' => 'Amal',
            'email' => 'unitoc@gmail.com',
            'mobile' => '0712518433',
            'address' => 'PahalaYagoda,Ganemulla',
            'employee_no' => 'E3',
            'regement_no' => 'R3',
            'regement_id' => '2',
            'unit_id' => '2',
            'rank_id' => '3',
            'role' => '3',
            'delete' => '1',
            'password' => Hash::make('123456789'),
        ]);
        User::factory()->create([
            'name' => 'Anil',
            'email' => 'shopcoordclerk@gmail.com',
            'mobile' => '0712518434',
            'address' => 'PahalaYagoda,Ganemulla',
            'employee_no' => 'E4',
            'regement_no' => 'R4',
            'regement_id' => '2',
            'unit_id' => '1',
            'rank_id' => '2',
            'role' => '4',
            'delete' => '1',
            'password' => Hash::make('123456789'),
        ]);
        User::factory()->create([
           'name' => 'sunil',
            'email' => 'shopcoordoc@gmail.com',
            'mobile' => '0712518435',
            'address' => 'PahalaYagoda,Ganemulla',
            'employee_no' => 'E5',
            'regement_no' => 'R5',
            'regement_id' => '2',
            'unit_id' => '3',
            'rank_id' => '2',
            'role' => '5',
            'delete' => '1',
            'password' => Hash::make('123456789'),
        ]);
        User::factory()->create([
            'name' => 'kamal',
            'email' => 'welfareshopclerk@gmail.com',
            'mobile' => '0712518436',
            'address' => 'PahalaYagoda,Ganemulla',
            'employee_no' => 'E6',
            'regement_no' => 'R6',
            'regement_id' => '1',
            'unit_id' => '2',
            'rank_id' => '2',
            'role' => '6',
            'delete' => '1',
            'password' => Hash::make('123456789'),
        ]);
        User::factory()->create([
            'name' => 'nimal',
            'email' => 'welfareshopoc@gmail.com',
            'mobile' => '0712518437',
            'address' => 'PahalaYagoda,Ganemulla',
            'employee_no' => 'E7',
            'regement_no' => 'R7',
            'regement_id' => '3',
            'unit_id' => '2',
            'rank_id' => '2',
            'role' => '7',
            'delete' => '1',
            'password' => Hash::make('123456789'),
        ]);
        User::factory()->create([
            'name' => 'sunimal',
            'email' => 'ledgerclerk@gmail.com',
            'mobile' => '0712518438',
            'address' => 'PahalaYagoda,Ganemulla',
            'employee_no' => 'E8',
            'regement_no' => 'R8',
            'regement_id' => '3',
            'unit_id' => '3',
            'rank_id' => '2',
            'role' => '8',
            'delete' => '1',
            'password' => Hash::make('123456789'),
        ]);
        User::factory()->create([
            'name' => 'sapumal',
            'email' => 'ledgeroc@gmail.com',
            'mobile' => '0712518439',
            'address' => 'PahalaYagoda,Ganemulla',
            'employee_no' => 'E9',
            'regement_no' => 'R9',
            'regement_id' => '2',
            'unit_id' => '3',
            'rank_id' => '3',
            'role' => '9',
            'delete' => '1',
            'password' => Hash::make('123456789'),
        ]);
        User::factory()->create([
            'name' => 'shenal',
            'email' => 'shenal@gmail.com',
            'mobile' => '0712518440',
            'address' => 'PahalaYagoda,Ganemulla',
            'employee_no' => 'E10',
            'regement_no' => 'R10',
            'regement_id' => '3',
            'unit_id' => '3',
            'rank_id' => '3',
            'role' => '0',
            'delete' => '1',
            'password' => Hash::make('123456789'),
        ]);
    }
}
