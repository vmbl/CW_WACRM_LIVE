<?php

namespace Database\Seeders;

use App\Models\Leads;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LeadsSeeder extends Seeder
{
    public function run(): void
    {
        $messages = [];

        for ($i = 1; $i <= 15; $i++) {
           
            Leads::create([
                'name' => 'Name_'.rand(1,3),
                'email' => 'Name_'.rand(1,3).'@example.com',
                'phone' => '956676701'.$i,
                'source' => 'seed',
                'status' => 'new_lead',
                'notes' => "Sample note",
                'interested_in' => "Product",
                'assigned_to' => 1,
                'tags' => ["sales", "new", "product"]
            ]);
            
        }
        //DB::connection('mongodb')->collection('messages')->insert($messages);
    }
}
