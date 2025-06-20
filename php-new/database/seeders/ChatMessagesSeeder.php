<?php

namespace Database\Seeders;

use App\Models\Messages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChatMessagesSeeder extends Seeder
{
    public function run(): void
    {
        $messages = [];

        for ($i = 1; $i <= 115; $i++) {
           
            Messages::create([
                'from' => 'user_' . rand(1, 3),
                'to' => 'user_' . rand(4, 6),
                'message' => 'This is a test message #' . $i,
                'type' => 'text',
                'read' => false
            ]);
            
        }
        //DB::connection('mongodb')->collection('messages')->insert($messages);
    }
}
