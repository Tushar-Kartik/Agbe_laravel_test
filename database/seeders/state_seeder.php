<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class state_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  
            DB::table('state')->insert([
          
                ['state_name' => 'Province No. 1', 'country_id' => 2],
                ['state_name' => 'Province No. 2', 'country_id' => 2],
               

                ['state_name' => 'Uttar Pradesh', 'country_id' => 1],
                ['state_name' => 'Bihar', 'country_id' => 1],
              
            ]);
            
    
    }
}
